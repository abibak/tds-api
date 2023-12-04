<?php

namespace App\Http\Requests;

use App\Exceptions\APIException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class APIRequest extends FormRequest
{
    /**
     * @throws APIException
     */
    public function failedValidation(Validator $validator)
    {
        throw new APIException('Validation error.', 422, $validator->errors());
    }

    public function all($keys = null): array
    {
        $data = parent::all();

        if ($this->getMethod() === 'GET' ||
            $this->getMethod() === 'PUT' ||
            $this->getMethod() === 'DELETE'
        ) {
            return array_merge($data, $this->route()->parameters());
        }

        return $data;
    }
}
