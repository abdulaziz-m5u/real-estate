<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenueRequest extends FormRequest
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
        return   [
            'name'          => 'required',
            'slug'          => 'required',
            'location_id'   => 'required','integer',
            'event_types.*'  => [
                'integer',
            ],
            'event_types'    => [
                'array',
            ],
            'address'        => [
                'required',
            ],
            'people_minimum' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'people_maximum' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
