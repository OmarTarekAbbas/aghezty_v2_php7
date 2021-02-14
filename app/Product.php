<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Traits\Translatable;
class Product extends Model
{
  use Translatable;
  protected $table="products";
  protected $fillable = ['title','main_image','price','discount','price_after_discount',
                        'special','active','description','short_description','category_id','brand_id','stock', 'inch','sku',
                        'key_feature','warranty','delivery_time','cash_on_delivery','return_or_refund','offer'];

  protected $dates = ['deleted_at'];
  public function getPriceAttribute($value){
    return (int) $value;
  }
  public function getPriceAfterDiscountAttribute($value){
    return (int) $value;
  }

  ///////////////////set image///////////////////////////////
  public function setMainImageAttribute($value)
  {
    $path     = '/uploads/product/'.date('Y-m-d').'/';
    if(is_file($value))
    {
      $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
      $value->move(base_path($path),$img_name);
      $this->attributes['main_image']= $path.$img_name ;
    }
    else{
      $this->attributes['main_image']= $path.$value ;
    }

  }

  public function getMainImageAttribute($value)
  {
    return url(file_exists(base_path($value)) ? $value : 'images/not_found.png');
  }

  public function category()
  {
    return $this->belongsTo('App\Category','category_id','id');
  }

  public function brand()
  {
    return $this->belongsTo('App\Brand','brand_id','id');
  }

  public function images()
  {
    return $this->hasMany('App\ProductImage','product_id','id');
  }

  public function operators()
  {
    return $this->belongsToMany('App\Operator','posts','product_id','operator_id')
    ->withPivot('id','published_date','active','url','user_id')->withTimestamps();
  }

  public function posts()
  {
    return $this->hasMany('App\Post','product_id','id');
  }

  public function client_rates()
  {
      return $this->belongsToMany('App\Client','client_rates','product_id','client_id')->latest('client_rates.created_at')
      ->withPivot('id', 'rate' , 'comment' , 'publish')->where('publish','=', 1)->withTimestamps();
  }

  public function admin_rates()
  {
      return $this->belongsToMany('App\Client','client_rates','product_id','client_id')
      ->withPivot('id', 'rate' , 'comment' , 'publish')->withTimestamps();
  }

  public function client_carts()
  {
      return $this->belongsToMany('App\Client','carts','product_id','client_id')
      ->withPivot('id', 'quantity' , 'price' ,'total_price')->withTimestamps();
  }

  public function pr_value()
  {
      return $this->belongsToMany('App\PropertyValue','product_properties','product_id','property_value_id');
  }

  public function orders()
  {
    return $this->hasMany('App\OrderDetail','product_id','id');
  }

  public function wishList()
  {
      return $this->belongsToMany('App\Client','wish_lists','product_id','client_id');
  }

  public function rate()
  {
    return \DB::table('client_rates')
          ->where('product_id',$this->id)
          ->where('publish',1)
          ->avg('rate');
  }

  public function scopeStock($query)
  {
    return $query->where("stock", ">", 0);
  }

  /**
   * The "boot" method of the model.
   *
   * @return void
   */
  protected static function boot() {
    parent::boot();

    static::addGlobalScope('price', function (Builder $builder) {
      $builder->where('price', '>', 0)
      ->orWhere('price_after_discount', '>', 0);
    });

    static::deleting(function($product) { // before delete() method call this
        if(file_exists(base_path('/uploads/product/'.basename($product->main_image))))
        {
            unlink(base_path('/uploads/product/'.basename($product->main_image))) ;
        }
    });

  }


}
