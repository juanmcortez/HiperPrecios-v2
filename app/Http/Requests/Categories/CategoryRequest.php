<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|max:64',
            'slug'          => 'required|max:64',
            'similar'       => 'required',
            'searchable'    => 'nullable|in:"on","off"',
            'enabled'       => 'nullable|in:"on","off"',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => 'The <strong>Category Name</strong> field is required.',
            'name.max'          => 'The <strong>Category Name</strong> field is too long.',
            'slug.required'     => 'The <strong>Category Slug</strong> field is required.',
            'slug.max'          => 'The <strong>Category Slug</strong> field is too long.',
            'similar.required'  => 'The <strong>Similar</strong> field is required.',
            'searchable.in'     => 'The <strong>Category Searchable</strong> can be checked or un-checked only.',
            'enabled.in'        => 'The <strong>Category Enabled</strong> can be checked or un-checked only.',
        ];
    }
}
