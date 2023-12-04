<?php

namespace App\Exceptions;


use Illuminate\Http\Exceptions\HttpResponseException;

class APIException extends HttpResponseException
{
    public function __construct(string $message = "Validation error.", int $code = 422, $errors = [])
    {
        $response_data = [
            'message' => $message,
            'code' => $code,
        ];

        if (!empty($errors)) {
            $response_data['errors'] = $errors;
        }

        parent::__construct(response()->json($response_data)->setStatusCode($code));
    }
}
