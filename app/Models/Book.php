<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'author', 'registration_number', 'situation', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
