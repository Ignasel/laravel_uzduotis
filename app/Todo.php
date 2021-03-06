<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['subject', 'priority', 'due_date', 'status', 'progress', 'userID'];
}
