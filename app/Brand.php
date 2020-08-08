<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;
class Brand extends Model
{
    use  Translatable;
    protected $table = 'brands';
    protected $fillable = ['title', 'image', 'limit_price','category_ids'];
    ///////////////////set image///////////////////////////////
    public function setImageAttribute($value){
        if(is_file($value)){
            $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
            $path     = '/uploads/brand/'.date('Y-m-d').'/';
            $value->move(base_path($path),$img_name);
            $this->attributes['image']= $path.$img_name ;
        }
        else{
            $this->attributes['image']= $value ;
        }
    }

    public function setCategoryIdsAttribute($value){
      $this->attributes['category_ids'] = is_array($value) ? implode(",", $value) : '';
    }

    public function setLimitPriceAttribute($value){
      $this->attributes['limit_price'] = $value ? $value : 0;
    }

    public function getImageAttribute($value)
    {
        if(isset($value)){
            return url($value);
        }
        else{
            return $value;
        }

    }


    public function products()
    {
      return $this->hasMany('App\Product','brand_id','id');
    }
}
