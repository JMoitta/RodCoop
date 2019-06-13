<?php

namespace App\Http\Requests\PrayingHouse;

use Illuminate\Foundation\Http\FormRequest;

class StorePrayingHouse extends FormRequest
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
            'locality'                 => 'required|max:255',
            'saturday'                 => 'required|boolean',
            'sunday'                   => 'required|boolean',
            'address'                  => 'required|max:255',
            'cooperator_craft_id'      => 'required|exists:cooperators,id',
            'administrative_region_id' => 'required|exists:administrative_regions,id'
        ];
    }
}
