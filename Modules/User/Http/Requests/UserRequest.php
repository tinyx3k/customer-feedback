<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name'     => 'required|max:255',
            'first_name'     => 'required|max:255',
            'middle_name'     => 'required|max:255',
            'email'     => 'required|max:255|unique:users',
            'mobile'     => 'required|max:255|unique:users',
            'role_id'     => 'required|max:255',

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
            'first_name.required' => 'First Name is required.',
            'middle_name.required' => 'Middle Name is required',
            'email.unique' => 'Email has already been taken',
            'email.required' => 'Email is required',
            'mobile.unique' => 'Mobile number has already been taken',
            'mobile.required' => 'Mobile number is required',
            'role_id.required' => 'Role is required',


        ];
    }
}
