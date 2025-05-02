<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;


class User extends Model
{

    protected  $fillable = ['name', 'email', 'registration_number'];

}
