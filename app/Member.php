<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
           'name',
           'email',
           'phone',
           'birth_day',
           // 'state',
           // 'city',
     ];

    public function address()
   {
       return $this->hasOne(Address::class);
   }
}
