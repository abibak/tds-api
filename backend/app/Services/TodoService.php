<?php

namespace App\Services;

use App\Exceptions\APIException;
use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Gate;

class TodoService
{
    public function create($request)
    {
        $model = TodoList::find($request['todo_list_id']);

        Gate::authorize('create', [Todo::class, $model->user_id]);

        $todo = Todo::create($request);

        if (!$todo) {
            throw new APIException('Error creating.', 400);
        }

        return $todo;
    }

    public function show($request)
    {
        $model = Todo::find($request['id']);

        if (!$model) {
            throw new APIException('Error updating.', 400);
        }

        return $model;
    }

    public function update($request)
    {
        $model = Todo::find($request['id']);

        Gate::authorize('update', $model->todo_list);

        if ($model->update(['name' => $request['name']])) {
            return collect($model)->forget('todo_list');
        }

        throw new APIException('Error updating.', 400);
    }

    public function destroy($request)
    {
        $model = Todo::find($request['id']);

        Gate::authorize('delete', $model->todo_list);

        if (!$model->delete()) {
            throw new APIException('Error deleting.', 400);
        }
    }
}
