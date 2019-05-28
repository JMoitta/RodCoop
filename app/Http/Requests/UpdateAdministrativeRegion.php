<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministrativeRegion extends FormRequest
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
        $administrativeRegion = request('administrative_region');

        
        $id = $administrativeRegion->id;
        return [
            'description' => "required|unique:administrative_regions,description,$id,id|max:255", 
        ];
    }
}
