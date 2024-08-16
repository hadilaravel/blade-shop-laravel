<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Blog\Comment;
use Modules\Admin\Entities\Shop\Address;
use Modules\Admin\Entities\Shop\City;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\Province;
use Modules\Home\Http\Requests\AddressRequest;
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

}
