<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Constants\PaymentStatus;
use App\Constants\OrderStatus;
use App\Constants\PaymentType;

class Order extends Model
{
    protected $fillable = [
      'client_id' , 'address_id' , 'shipping_amount' , 'status' , 'total_price','lang','payment','payment_status','transaction_id'
    ];

    public function getTotalPriceAttribute($value)
    {
      return (int) $value;
    }

    public function getStatusAttribute($value)
    {
      return OrderStatus::getLabel($value);
    }

    public function getPaymentAttribute($value)
    {
      return PaymentType::getLabel($value);
    }

    public function getPaymentStatusAttribute($value)
    {
      return PaymentStatus::getLabel($value);
    }

    public function products()
    {
      return $this->hasMany('App\OrderDetail');
    }

    public function client()
    {
      return $this->belongsTo('App\Client');
    }

    public function address()
    {
      return $this->belongsTo('App\ClientAddress','address_id');
    }

    public function replaies()
    {
      return $this->hasMany('App\OrderReplay','order_id');
    }

    public function sum()
    {
      return (int) \App\OrderDetail::where('order_id',$this->id)->sum('total_price');
    }
}
