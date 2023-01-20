<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function tasks()
    {
        //Many-to-many relationships are defined by writing a method that returns the result of the belongsToMany method
        return $this->belongsToMany(Task::class);
    }
}
