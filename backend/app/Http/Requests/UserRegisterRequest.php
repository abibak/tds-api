<?php

namespace App\Http\Requests;


class UserRegisterRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|unique:users',
            'password' => 'bail|required|string',
        ];
    }
}
