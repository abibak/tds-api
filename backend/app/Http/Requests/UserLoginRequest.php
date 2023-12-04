<?php

namespace App\Http\Requests;


class UserLoginRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'bail|required|string',
            'password' => 'bail|required|string',
        ];
    }
}
