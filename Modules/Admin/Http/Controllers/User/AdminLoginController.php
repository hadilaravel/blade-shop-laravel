<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminLoginController extends Controller
{

    public function show()
    {
        return view('admin::login-admin.login-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:120|min:5|regex:/^[a-zA-Z0-9]+$/u',
            'password' =>  ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        $user = User::query()->where('username' , $request->username)->where('user_type' , 1)->where('activation' , 1)->first();
        if(empty($user))
        {
            return to_route('admin.admin-login.show')->withErrors(['error' => 'اطلاعات وارد شده معتبر نمی باشد']);
        }
        if(Hash::check( $request->password , $user->password ))
        {
            Auth::loginUsingId($user->id);
            return to_route('admin.index');
        }else{
            return to_route('admin.admin-login.show')->withErrors(['error' => 'اطلاعات وارد شده معتبر نمی باشد']);
        }

    }

    public function logout()
    {
        Auth::logout();
        return to_route('home.index');
    }

}
