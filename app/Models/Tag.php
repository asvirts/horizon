<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
