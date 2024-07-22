<?php

namespace Modules\Admin\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->id;
        if($this->isMethod('post')) {
            return [
                'name' => 'required|min:2|max:190|unique:product_categories,name',
                'status' => 'required|numeric|in:0,1',
                'parent_id' => 'nullable|exists:product_categories,id',
            ];
        }else{
            return [
                'name' => ['required' , 'min:2' , 'max:190' , 'unique:product_categories,name,' .  $id ],
                'status' => 'required|numeric|in:0,1',
                'parent_id' => 'nullable|exists:product_categories,id',
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
