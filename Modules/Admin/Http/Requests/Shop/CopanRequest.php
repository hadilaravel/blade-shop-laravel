<?php

namespace Modules\Admin\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|max:120|min:2',
            'amount_type' => 'required|in:0,1',
            'amount' => [(request()->amount_type == 0) ? 'max:100' : '', 'numeric', 'required'],
            'discount_ceiling' => 'nullable|max:1000000000000|min:1|numeric',
            'type' => 'required|numeric|in:0,1',
            'status' => 'required|numeric|in:0,1',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
            'user_id' => 'required_if:type,==,1|min:1|max:100000000|regex:/^[0-9]+$/u|exists:users,id',
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
