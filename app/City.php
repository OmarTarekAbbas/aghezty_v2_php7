<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city_en', 'city_ar', 'shipping_amount' , 'governorate_id'];

    public function governorate()
    {
        return $this->belongsTo('App\Governorate','governorate_id');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client','client_addresses','city_id','client_id')
        ->withPivot('id','address','details')->withTimestamps();
    }

    public function getShippingAmountAttribute($value){
      return (int) $value;
    }
}
