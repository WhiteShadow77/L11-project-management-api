<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_completed',
        'project_id',
    ];

    // Automatically cast the database boolean (0/1) to a real PHP boolean (true/false)
    protected $casts = [
        'is_completed' => 'boolean',
    ];

    // A Task belongs to a Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
