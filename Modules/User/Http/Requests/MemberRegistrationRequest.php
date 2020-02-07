<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'gender' => 'required|max:255',
            'civil_status' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'place_of_birth' => 'required|max:255',
            'citizenship' => 'required|max:255',
            'address2' => 'required|max:255',
            'address3' => 'required|max:255',
            'address4' => 'required|max:255',
            'address5' => 'required|max:255',
            'address7' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'mobile' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
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
     public function messages()
    {
        return [
            'last_name.required' => 'A Last Name is required',
            'first_name.required' => 'A First Name is required',
            'gender.required' => 'A Gender is required',
            'civil_status.required' => 'A Civil Status is required',
            'birthdate.required' => 'A Birthday is required',
            'place_of_birth.required' => 'A Place of Birth Status is required',
            'citizenship.required' => 'A Citizenship is required',
            'address2.required' => 'Address is required',
            'address3.required' => 'Address is required',
            'address4.required' => 'Address is required',
            'address5.required' => 'Address is required',
            'address6.required' => 'Address is required',
            'address7.required' => 'Address is required',
            'zip_code.required' => 'A Zip Code is required',
            'mobile.required' => 'A Mobile Number is required',
            'email.required' => 'A Email Address is required',


        ];
    }
}
