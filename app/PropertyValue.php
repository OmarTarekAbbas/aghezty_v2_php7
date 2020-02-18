<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;
class PropertyValue extends Model
{
  use Translatable;
  protected $table="property_values";

  protected $fillable = ['value','property_id'];

  public function property()
  {
    return $this->belongsTo(Property::class);
  }

  public function pr_value()
  {
      return $this->belongsToMany('App\Product','product_properties','propety_value_id','product_id');
  }
}
