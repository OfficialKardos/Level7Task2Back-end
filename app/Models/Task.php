<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name', 'description', 'schedule_date', 'priority', 'assigned_to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
