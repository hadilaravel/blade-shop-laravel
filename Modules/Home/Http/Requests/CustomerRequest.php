<?php

namespace Modules\Home\Http\Requests;

use App\Rules\NationalCode;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required' , 'string'],
            'email' => ['nullable' , 'email' , 'unique:users,email'],
            'mobile' => ['nullable' , 'numeric' , 'unique:users,mobile, ' . auth()->id()],
            'username' => ['nullable' , 'unique:users,username, ' . auth()->id()],
            'password' => ['nullable', 'min:6' , 'max:255' , 'unique:users,password',  'confirmed'],
            'profile' => ['nullable' , 'image' , 'mimes:png,jpg,jpeg,gif,webp'],
            'national_code' => ['nullable' ,  new NationalCode() , 'unique:users,national_code, ' . auth()->id()],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
