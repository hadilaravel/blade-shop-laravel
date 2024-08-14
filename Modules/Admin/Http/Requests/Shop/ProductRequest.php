<?php

namespace Modules\Admin\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'name' => 'required|max:120|min:2',
                'introduction' => 'required',
                'weight' => 'required|max:1000|min:1',
                'length' => 'required|max:1000|min:1',
                'width' => 'required|max:1000|min:1',
                'height' => 'required|max:1000|min:1',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'brand_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:brands,id',
            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2',
                'introduction' => 'required',
                'weight' => 'required|max:1000|min:1',
                'length' => 'required|max:1000|min:1',
                'width' => 'required|max:1000|min:1',
                'height' => 'required|max:1000|min:1',
                'price' => 'required|numeric',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'brand_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:brands,id',
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
