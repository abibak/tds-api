<?php

namespace App\Policies;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, $user_id)
    {
        return $user->id === $user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TodoList $todoList)
    {
        return $user->id === $todoList->user_id;
    }
}
