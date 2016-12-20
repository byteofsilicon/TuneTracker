<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            'name' => 'required',
            'band_id' => 'required',
            'recorded_date' => 'sometimes|date_format:"Y-m-d"',
            'release_date' => 'sometimes|date_format:"Y-m-d"',
            'number_of_tracks' => 'sometimes|numeric',
            'label' => 'sometimes|string',
            'producer' => 'sometimes|string',
            'genre' => 'sometimes|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'band_id.required' => 'A band is required',
        ];
    }
}
