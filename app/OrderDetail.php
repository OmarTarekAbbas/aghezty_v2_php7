<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id' , 'product_id' , 'quantity' , 'price' , 'total_price'
    ];

    public function getTotalPriceAttribute($value){
      return (int) $value;
    }
    public function getPriceAttribute($value){
      return (int) $value;
    }

    public function order()
    {
      return $this->belongsTo('App\Order','order_id');
    }

    public function product()
    {
      return $this->belongsTo('App\Product','product_id');
    }

    public function order_product()
    {
      return $this->belongsTo('App\Product','product_id')->withTrashed();
    }
}
