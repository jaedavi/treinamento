<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address',
        'number',
        'member_id',
        'state_id',
        'city_id',
        'district',
        'complement'
    ];

    public function member()
   {
       return $this->belongsTo(Member::class);
   }

   public function state()
   {
       return $this->belongsTo(State::class);
   }

   public function city()
   {
       return $this->belongsTo(City::class);
   }
}
