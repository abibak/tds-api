<?php

namespace App\Services;

use App\Exceptions\APIException;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class TodoListService
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            return TodoList::with('todos')->get();
        }

        return TodoList::where('user_id', '=', auth()->user()->id)->with('todos')->get();
    }

    public function create($request)
    {
        Gate::authorize('create', [TodoList::class, $request['user_id']]);

        $model = TodoList::create($request);

        if (!$model) {
            throw new APIException('Error creating.', 400);
        }

        return $model;
    }

    public function show($request)
    {
        $model = TodoList::with('todos')->find($request['id']);

        Gate::authorize('show', $model);

        if (!$model) {
            throw new APIException('Error updating.', 400);
        }

        return $model;
    }

    public function update($request)
    {
        $model = TodoList::find($request['id']);

        Gate::authorize('update', $model);

        if ($model->update(['name' => $request['name']])) {
            return $model;
        }

        throw new APIException('Error updating.', 400);
    }

    public function destroy($request)
    {
        $model = TodoList::find($request['id']);

        Gate::authorize('delete', $model);

        if (!$model->delete()) {
            throw new APIException('Error deleting.', 400);
        }
    }
}
