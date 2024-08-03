<?php

namespace Modules\Admin\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class AmazingSaleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'percentage' => 'required|max:100|min:1|numeric',
            'status' => 'required|numeric|in:0,1',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
            'product_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:products,id',
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
