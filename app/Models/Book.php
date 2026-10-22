<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'price',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'book_id');
    }
}
