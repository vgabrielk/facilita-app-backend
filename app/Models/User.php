<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;


class User extends Model
{

    protected $table = 'users';

    protected  $fillable = ['name', 'email', 'registration_number'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}
