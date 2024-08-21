<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Service\ShareService;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Blog\Comment;
use Modules\Admin\Entities\Shop\Address;
use Modules\Admin\Entities\Shop\CartItem;
use Modules\Admin\Entities\Shop\City;
use Modules\Admin\Entities\Shop\CommonDiscount;
use Modules\Admin\Entities\Shop\Delivery;
use Modules\Admin\Entities\Shop\Order;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\Province;
use Modules\Home\Http\Requests\AddressRequest;
use Modules\Home\Http\Requests\ChooseAddressAndDeliveryRequest;
use Modules\Home\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    public function profile()
    {
        return view('home::customer.profile');
    }

    public function profilePersonalInfo()
    {
        return view('home::customer.profile-personal-info');
    }

    public function profilePersonalInfoStore(CustomerRequest $request)
    {
        $inputs = $request->all();

        if($request->hasFile('profile')) {
            $imageName = ShareService::uploadFilePublic($request->file('profile') ,'profile/user');
            $inputs['profile'] = $imageName;
        }
        $user = auth()->user();
        $user->update($inputs);
        alert()->success('اطلاعات شما با موفقیت ویرایش شد');
        return back();
    }

    public function addToFavorite(Product $product)
    {
        if(Auth::check()){
            $product->users()->toggle(\auth()->id());
            if($product->users->contains(\auth()->id())){
                alert()->success('اضافه شدن به علاقه مندی ها با موفقیت انجام شد');
                return back();
            }
            else{
                alert()->success('حذف از علاقه مندی ها با موفقیت انجام شد');
                return back();
            }
        }
    }

    public function myFavorites()
    {
        return view('home::customer.profile-favorites');
    }

    public function deleteFavorite(Product $product)
    {
        $user = auth()->user();
        $user->products()->detach($product->id);
        alert()->success('حذف از علاقه مندی ها با موفقیت انجام شد');
        return back();
    }

    public function myComments()
    {
        $comments = Comment::query()->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->where('author_id' , \auth()->id())->get();
        return view('home::customer.profile-comments' , compact('comments'));
    }

    public function DeleteMyComments(Comment $comment)
    {
        $comment->delete();
        alert()->success('نظر شما با موفقیت حذف شد');
        return back();
    }

    public function myAddress()
    {
        return view('home::customer.profile-address');
    }

    public function myAddressCreate()
    {
        $cities = City::all();
        $provinces = Province::all();
        return view('home::customer.address-create' , compact('cities' , 'provinces'));
    }

    public function getCities(Province $province)
    {
        $cities = $province->cities;
        if($cities != null){
            return response()->json(['status' => true , 'cities' => $cities]);
        }else{
            return response()->json(['status' => false , 'cities' => null]);
        }
    }

    public function myAddressStore(AddressRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = \auth()->id();
        $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
        $inputs['postal_code'] = convertPersianToEnglish($request->postal_code);
        Address::query()->create($inputs);
        alert()->success('آدرس شما با موفقیت ساخته شد');
        return to_route('user.profile.my-address');
    }

    public function myAddressDelete(Address $address)
    {
        $address->delete();
        alert()->success('آدرس شما با موفقیت حذف شد');
        return to_route('user.profile.my-address');
    }

    public function myAddressEdit(Address $address)
    {
        $cities = City::all();
        $provinces = Province::all();
        return view('home::customer.address-edit' , compact('cities' , 'provinces' , 'address'));
    }

    public function myAddressUpdate(AddressRequest $request , Address $address)
    {
        $inputs = $request->all();
        $inputs['user_id'] = \auth()->id();
        $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
        $inputs['postal_code'] = convertPersianToEnglish($request->postal_code);
        $address->update($inputs);
        alert()->success('آدرس شما با موفقیت ویرایش شد');
        return to_route('user.profile.my-address');
    }

    public function chooseAddressAndDelivery()
    {
        $user = \auth()->user();
        $addresses = Address::query()->where('user_id' , $user->id)->get();
        $deliveries = Delivery::query()->where('status' , 1)->get();
        if(empty($addresses))
        {
            alert()->error('لطفا برای خرید محصول آدرسی بسازید', 'آدرس ندارید !');
            return to_route('user.profile.my-address');
        }
        if(empty($user->national_code))
        {
            alert()->error('لطفا ابتدا کد ملی خود را وارد کنید', ' کد ملی !');
            return to_route('user.profile.personal-info');
        }
        return view('home::customer.choose-address-delivery' , compact('addresses' , 'deliveries'));
    }

    public function chooseAddressAndDeliveryStore(ChooseAddressAndDeliveryRequest $request)
    {
        $user = \auth()->user();
        $inputs = $request->all();
        $inputs = [
          'address_id' => $request->address_id,
          'delivery_id' => $request->delivery_id,
        ];
        //calc price
        $cartItems = CartItem::query()->where('user_id', $user->id)->get();
        $totalProductPrice = 0;
        $totalDiscount = 0;
        $totalFinalPrice = 0;
        $totalFinalDiscountPriceWithNumbers = 0;
        foreach ($cartItems as $cartItem)
        {
            $totalProductPrice += $cartItem->cartItemProductPrice();
            $totalDiscount += $cartItem->cartItemProductDiscount();
            $totalFinalPrice += $cartItem->cartItemFinalPrice();
            $totalFinalDiscountPriceWithNumbers += $cartItem->cartItemFinalDiscount();
        }

        //commonDiscount
        $commonDiscount = CommonDiscount::query()->where('status' , 1)->where('end_date', '>', now())->where('start_date', '<', now())->first();
        if($commonDiscount)
        {
            $inputs['common_discount_id'] = $commonDiscount->id;
            $commonPercentageDiscountAmount = $totalFinalPrice * ($commonDiscount->percentage / 100);
            if($commonPercentageDiscountAmount > $commonDiscount->discount_ceiling)
            {
                $commonPercentageDiscountAmount = $commonDiscount->discount_ceiling;
            }
            if($commonDiscount != null and $totalFinalPrice >= $commonDiscount->minimal_order_amount)
            {
                $finalPrice = $totalFinalPrice - $commonPercentageDiscountAmount;
            }
            else{
                $finalPrice = $totalFinalPrice;
            }
        }
        else{
            $commonPercentageDiscountAmount = null;
            $finalPrice = $totalFinalPrice;
        }


        $inputs['user_id'] = $user->id;
        $inputs['order_final_amount'] = $finalPrice;
        $inputs['order_discount_amount'] = $totalFinalDiscountPriceWithNumbers;
        $inputs['order_common_discount_amount'] = $commonPercentageDiscountAmount;
        $inputs['order_total_products_discount_amount'] = $inputs['order_discount_amount'] + $inputs['order_common_discount_amount'];
        $order = Order::query()->updateOrCreate(
            ['user_id' => $user->id, 'order_status' => 0],
            $inputs
        );
        return to_route('user.profile.payment');
    }


}
