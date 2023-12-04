<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'todo_list_id',
        'created_at',
    ];

    public function todo_list()
    {
        return $this->belongsTo(TodoList::class, 'todo_list_id');
    }
}
