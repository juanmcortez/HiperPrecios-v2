<?php

namespace App\Http\Requests\Stores;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'storeShortName'        => 'required|max:64',
            'storeFullName'         => 'required|max:128',
            'storeApiUrl'           => 'required|max:256',
            'enableApiScrapping'    => 'nullable|in:"on","off"',
            'isaVtexStore'          => 'nullable|in:"on","off"',
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
            'storeShortName.required'   => 'The <strong>Sytem Name</strong> field is required.',
            'storeShortName.max'        => 'The <strong>Sytem Name</strong> field is too long.',
            'storeFullName.required'    => 'The <strong>Store Name</strong> field is required.',
            'storeFullName.max'         => 'The <strong>Store Name</strong> field is too long.',
            'storeApiUrl.required'      => 'The <strong>Store API Url</strong> field is required.',
            'storeApiUrl.max'           => 'The <strong>Store API Url</strong> field is too long.',
            'enableApiScrapping.in'     => 'The <strong>Get products and prices?</strong> can be checked or un-checked only.',
            'isaVtexStore.in'           => 'The <strong>Is a VTEX Store?</strong> can be checked or un-checked only.',
        ];
    }
}
