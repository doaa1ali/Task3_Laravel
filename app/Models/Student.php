<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
     use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

