<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
  protected $fillable = ['property_value_id','product_id'];

  public function pvalue()
  {
    return $this->belongsTo(PropertyValue::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
