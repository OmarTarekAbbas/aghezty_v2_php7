<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Cart extends Model
{
    protected $table = "carts";
    protected $fillable = [
        'product_id' , 'client_id' , 'quantity' , 'price' , 'total_price'
    ];
    public function sub_total()
    {
      return (int)Cart::where('client_id',\Auth::guard('client')->user()->id)->sum('total_price');
    }
    public function getTotalPriceAttribute($value){
      return (int) $value;
    }
    public function getPriceAttribute($value){
      return (int) $value;
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    protected static function boot() {
      parent::boot();

      static::addGlobalScope('product', function (Builder $builder) {
        $builder->whereHas("product");
      });
    }
}
