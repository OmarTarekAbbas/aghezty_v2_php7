<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    protected $fillable = ['address', 'city_id', 'details' , 'client_id'];

    public function city()
    {
      return $this->belongsTo('App\City','city_id');
    }
}
