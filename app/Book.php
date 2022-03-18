<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'pages',
        'isbn',
        'published_at',
        'editorial_id',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }
}
