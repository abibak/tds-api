<?php

namespace App\Http\Controllers\API;

use App\Events\CreatedTodo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\TodoRequest;
use App\Services\TodoService;


class TodoController extends Controller
{
    protected $service;

    public function __construct(TodoService $service)
    {
        $this->service = $service;
    }


    public function create(TodoRequest $request)
    {
        $todo = $this->service->create($request->validated());

        /* Mail event */
        /*event(new CreatedTodo);*/

        return response()->json([
            'data' => $todo,
            'message' => 'Created.'
        ], 201);
    }

    public function show()
    {

    }

    public function update(TodoRequest $request)
    {
        $data = $this->service->update($request->validated());

        return response()->json([
            'data' => $data,
            'message' => 'Updated.'
        ], 200);
    }

    public function destroy(TodoRequest $request)
    {
        $this->service->destroy($request->validated());

        return response()->json([
            'message' => 'Deleted.'
        ], 200);
    }
}
