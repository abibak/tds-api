<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    public $table = 'todo_list';

    protected $fillable = [
        'name',
        'user_id',
        'created_at'
    ];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
