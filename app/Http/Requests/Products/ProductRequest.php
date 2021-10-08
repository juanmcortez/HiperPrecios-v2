<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'metaName'                  => 'nullable|max:128',
            'metaTitle'                 => 'nullable|max:128',
            'metaDescription'           => 'nullable',
            'nameShort'                 => 'nullable|max:128',
            'nameLong'                  => 'required|max:256',
            'ean'                       => 'required|max:20',
            'measuramentMultiplier'     => 'nullable|numeric',
            'measuramentUnit'           => 'nullable|max:3',
            'belongsToCategory'         => 'required|exists:categories,ID',
            'imageUrl'                  => 'nullable|file|image|dimensions:max_width=600,max_height=600,min_width=200,min_height=200'
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
            'metaName.max'                  => 'The <strong>Meta Name</strong> field can\'t contain more than 128 characters.',
            'metaTitle.max'                 => 'The <strong>Meta Title</strong> field can\'t contain more than 128 characters.',
            'nameShort.max'                 => 'The <strong>Short Name</strong> field can\'t contain more than 128 characters.',
            'nameLong.required'             => 'The <strong>Name</strong> field is required.',
            'nameLong.max'                  => 'The <strong>Name</strong> field can\'t contain more than 256 characters.',
            'ean.required'                  => 'The <strong>EAN</strong> field is required.',
            'ean.max'                       => 'The <strong>EAN</strong> field can\'t contain more than 20 characters.',
            'measuramentMultiplier.numeric' => 'The <strong>Weight / Units</strong> field has to be numeric.',
            'measuramentUnit.max'           => 'The <strong>Units</strong> field can\'t contain more than 3 characters.',
            'belongsToCategory.required'    => 'The <strong>Category</strong> field is required.',
            'belongsToCategory.exists'      => 'The <strong>Category</strong> selected does not exist.',
            'imageUrl.file'                 => 'The <strong>Product Image</strong> is not an uploaded file.',
            'imageUrl.image'                => 'The <strong>Product Image</strong> needs to be: jpg, jpeg, png, bmp, gif, svg, or webp.',
            'imageUrl.dimensions'           => 'The <strong>Product Image</strong> size needs to be: 600px x 600px max.'
        ];
    }
}
