<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['email','phone','name','product_id','city_id','lang','message'];


    public function city()
    {
      return $this->belongsTo('App\City','city_id');
    }
    public function product()
    {
      return $this->belongsTo('App\Product','product_id');
    }
}
