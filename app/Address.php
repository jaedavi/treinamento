<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address', 'number', 'member_id'];

    public function member()
   {
       return $this->belongsTo(Member::class);
   }
}
