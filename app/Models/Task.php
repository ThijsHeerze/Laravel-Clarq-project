<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'title', 'description', 'deadline'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        //Many-to-many relationships are defined by writing a method that returns the result of the belongsToMany method
        return $this->belongsToMany(Category::class);
    }
}
