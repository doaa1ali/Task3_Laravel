<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'email','profile_image','bio','job_description', 'book_id' ];

    public function book()
    {
        return $this->hasOne(Book::class, 'author_id');
    }
}
