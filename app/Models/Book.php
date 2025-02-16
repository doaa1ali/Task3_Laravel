<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name' , 'descraption', 'image','price','author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
}
