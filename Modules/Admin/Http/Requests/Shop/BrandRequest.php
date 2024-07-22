<?php

namespace Modules\Admin\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('post')){
            return [
                'persian_name' => 'required|max:120|min:2',
                'original_name' => 'required|max:120|min:2',
                'logo' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
                'status' => 'required|numeric|in:0,1',
            ];
        }
        else{
            return [
                'persian_name' => 'required|max:120|min:2',
                'original_name' => 'required|max:120|min:2',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp',
                'status' => 'required|numeric|in:0,1',
            ];
        }
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
