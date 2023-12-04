<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoList\TodoListRequest;
use App\Models\TodoList;
use App\Services\TodoListService;


class TodoListController extends Controller
{
    protected $service;

    public function __construct(TodoListService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = $this->service->index();

        return response()->json([
            'data' => $data,
            'message' => 'Received.'
        ], 200);
    }

    public function create(TodoListRequest $request)
    {
        $created = $this->service->create($request->validated());

        return response()->json([
            'data' => $created,
            'message' => 'Created.'
        ], 201);
    }

    public function show(TodoListRequest $request)
    {
        $data = $this->service->show($request->validated());

        return response()->json([
            'data' => $data,
            'message' => 'Received.'
        ], 200);
    }

    public function update(TodoListRequest $request, TodoList $todoList)
    {
        $todo_list = $this->service->update($request->validated());

        return response()->json([
            'data' => $todo_list,
            'message' => 'Updated.'
        ], 200);
    }

    public function destroy(TodoListRequest $request)
    {
        $this->service->destroy($request->validated());

        return response()->json([
            'message' => 'Deleted.'
        ], 200);
    }
}
