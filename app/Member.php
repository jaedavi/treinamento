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
    ];

    protected $appends = [
        'state_name',
        'city_name',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function state()
    {
        return $this->address->state;
    }

    public function getStateNameAttribute()
    {
        return $this->state()->state;
    }

    public function city()
    {
        return $this->address->city;
    }

    public function getCityNameAttribute()
    {
        return $this->city()->city;
    }
}
