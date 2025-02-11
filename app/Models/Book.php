<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name' , 'descraption', 'image','price','author_id'];

    public function author()
    {
        return $this->hasOne(Author::class, 'book_id');
    }
}
