<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    // A Project belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A Project has many Tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
