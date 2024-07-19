<?php

namespace Modules\Admin\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class LabelRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:190',
            'status' => 'required|numeric|in:0,1',
            'post_id' => 'required|exists:posts,id',
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
