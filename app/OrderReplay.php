<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Constants\OrderStatus;

class OrderReplay extends Model
{
    protected $fillable = ['order_id', 'client_id', 'admin_id', 'message', 'status'];

    public function getStatusAttribute($value)
    {
      return OrderStatus::getLabel($value);
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
