<?php

namespace App;
//use Illuminate\Database\Eloquent\ForceDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //use ForceDeletes;
    protected $fillable = ['image' ,'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function setImageAttribute($value)
    {
        $path     = '/uploads/product/'.date('Y-m-d').'/';


        if(is_file($value)){
        $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
        $value->move(base_path($path),$img_name);
        $this->attributes['image']= $path.$img_name ;
        }else{
          if(strpos($value,'uploads/product') !== false)
          {
            $this->attributes['image'] = $value;
          }else{
            $this->attributes['image']= $path.$value ;
          }
        }

    }

  public function getImageAttribute($value)
  {
    return url(file_exists(base_path($value)) ? $value : 'images/not_found.png');
  }

  protected static function boot() {
    parent::boot();
        static::deleting(function($productimg) { // before delete() method call this
            if(is_file(base_path('/uploads/product/'.basename($productimg->image))))
            {
                unlink(base_path('/uploads/product/'.basename($productimg->image))) ;
            }
       });
    }
}
