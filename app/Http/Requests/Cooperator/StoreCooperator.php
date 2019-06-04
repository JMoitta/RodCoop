<?php

namespace App\Http\Requests\Cooperator;

use Illuminate\Foundation\Http\FormRequest;

class StoreCooperator extends FormRequest
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
            'name' => 'required|max:255',
            'administrative_region_id' => 'required|exists:administrative_regions,id'
        ];
    }
}
