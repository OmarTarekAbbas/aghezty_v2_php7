<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderReplay extends Model
{
    protected $fillable = ['order_id', 'client_id', 'admin_id', 'message', 'status'];

    public function getStatusAttribute($value)
    {
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
    public function order()
    {
      return $this->belongsTo('App\Order');
    }
    public function admin()
    {
      return $this->belongsTo('App\User', 'admin_id');
    }
}
