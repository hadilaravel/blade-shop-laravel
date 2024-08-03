<?php

namespace Modules\Admin\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiscountRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'percentage' => 'required|max:100|min:1|numeric',
            'discount_ceiling' => 'required|max:100000000000000|min:1|numeric',
            'minimal_order_amount' => 'required|max:1000000000000|min:1|numeric',
            'status' => 'required|numeric|in:0,1',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
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
