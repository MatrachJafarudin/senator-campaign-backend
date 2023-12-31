<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'device_imei'   =>  'required',
            'area_id'       =>  'required|numeric',
            'image'         =>  'required|image|mimes:jpg,jpeg,png,gif',
        ];
    }
}
