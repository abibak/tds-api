<?php

namespace App\Http\Requests\TodoList;

use App\Http\Requests\APIRequest;

class TodoListRequest extends APIRequest
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
                    'id' => 'bail|required|int|exists:todo_list,id'
                ];

            case 'PUT':
                return [
                    'id' => 'bail|required|int|exists:todo_list,id',
                    'name' => 'bail|required|string|max:255'
                ];

            case 'POST':
                return [
                    'name' => 'bail|required|string|max:255',
                    'user_id' => 'bail|required|int|exists:users,id'
                ];

            case 'DELETE':
                return [
                    'id' => 'bail|required|int|exists:todo_list,id',
                ];
        }
    }
}
