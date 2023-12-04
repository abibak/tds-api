<?php

namespace App\Http\Requests\Todo;

use App\Http\Requests\APIRequest;

class TodoRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod()) {
            case 'GET':
                return [
                    'id' => 'bail|required|int|exists:todos,id'
                ];

            case 'PUT':
                return [
                    'id' => 'bail|required|int|exists:todos,id',
                    'name' => 'bail|required|string|max:100'
                ];

            case 'POST':
                return [
                    'name' => 'bail|required|string|max:100',
                    'todo_list_id' => 'bail|required|int|exists:todo_list,id'
                ];

            case 'DELETE':
                return [
                    'id' => 'bail|required|int|exists:todos,id',
                ];
        }
    }
}
