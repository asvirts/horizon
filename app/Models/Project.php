<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'start_date', 'end_date'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
