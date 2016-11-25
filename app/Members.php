<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'birth_day'];
}
