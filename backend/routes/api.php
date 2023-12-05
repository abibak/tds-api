<?php


use App\Http\Controllers\API\TodoController;
use App\Http\Controllers\API\TodoListController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/login', [UserController::class, 'login']);
Route::post('user/register', [UserController::class, 'register']);

Route::middleware('auth:api')->group(function() {
    Route::get('/user/get-user', [UserController::class, 'get_user']);

    /* Todo-list routes */
    Route::get('/todo-list/', [TodoListController::class, 'index']);
    Route::post('/todo-list/create', [TodoListController::class, 'create']);
    Route::get('/todo-list/show/{id}', [TodoListController::class, 'show']);
    Route::put('/todo-list/update/{id}', [TodoListController::class, 'update']);
    Route::delete('/todo-list/delete/{id}', [TodoListController::class, 'destroy']);

    /* Todo routes */
    Route::post('/todo/create', [TodoController::class, 'create']);
    Route::put('/todo/update/{id}', [TodoController::class, 'update']);
    Route::delete('/todo/delete/{id}', [TodoController::class, 'destroy']);
});
