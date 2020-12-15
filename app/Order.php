<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Constants\PaymentStatus;

class Order extends Model
{
    protected $fillable = [
        'client_id' , 'address_id' , 'shipping_amount' , 'status' , 'total_price','lang','payment','payment_status','transaction_id'
    ];

    public function getTotalPriceAttribute($value){
      return (int) $value;
    }
    public function getStatusAttribute($value){
        if($value == 1){
            $value = __('front.admin_status.pending');
        }
        if($value == 2){
            $value = __('front.admin_status.under_shipping');
        }
        if($value == 3){
            $value = 'Finshed';
        }
        return $value;
    }

    public function getPaymentAttribute($value){
        if($value == 1){
            $value = __('front.cash');
        }
        if($value == 2){
            $value = __('front.visa');
        }
        if($value == 3){
            $value = __('front.visa_after_deliver');
        }
        if($value == 4){
            $value = 'CIB VISA';
        }
        if($value == 5){
            $value = 'NBE VISA';
        }
        return $value;
    }

    public function getPaymentStatusAttribute($value){
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
