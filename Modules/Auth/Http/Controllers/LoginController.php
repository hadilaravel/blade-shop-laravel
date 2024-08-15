<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Setting\Setting;
use Modules\Auth\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    public function viewLogin()
    {
        $setting = Setting::query()->first();
        return view('auth::login' , compact('setting'));
    }

    public function storeLogin(LoginRequest $request)
    {
        $inputs = $request->all();

        //check id is email or not
        if(filter_var($inputs['id'], FILTER_VALIDATE_EMAIL))
        {
            $type = 1; // 1 => email
            $user = User::query()->where('email', $inputs['id'])->first();
            if(empty($user)){
                return back()->withErrors(['id' => 'ایمیل وارد شده وجود ندارد']);
            }
            if(Hash::check($request->password , $user->password ))
            {
                Auth::loginUsingId($user->id);
                alert()->success('شما با موفقیت وارد شدید');
                return to_route('home.index');
            }else{
                return back()->withErrors(['id' => 'رمز عبور وارد شده اشتباه است']);
            }
        }

        //check id is mobile or not
        elseif(preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])){
            $type = 0; // 0 => mobile;

            // all mobile numbers are in on format 9** *** ***
            $inputs['id'] = ltrim($inputs['id'], '0');
            $inputs['id'] = substr($inputs['id'], 0, 2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);
            $user = User::query()->where('mobile', $inputs['id'])->first();
            if(empty($user)){
                return back()->withErrors(['id' => 'شماره همراه وارد شده وجود ندارد']);
            }
            if(Hash::check($request->password , $user->password))
            {
                Auth::loginUsingId($user->id);
                alert()->success('شما با موفقیت وارد شدید');
                return to_route('home.index');
            }else{
                return back()->withErrors(['id' => 'رمز عبور وارد شده اشتباه است']);
            }
        }
        else{
            return back()->withErrors(['id' => 'شناسه ورودی شما نه شماره موبایل است نه ایمیل']);
        }

    }

    public function viewInfoLogin()
    {
        return view('auth::info-login');
    }

    public function viewInfoLoginStore(Request $request)
    {

    }

}
