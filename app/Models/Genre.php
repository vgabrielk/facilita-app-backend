<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];
public function book(){
    return $this->hasMany(Book::class);
}
}

