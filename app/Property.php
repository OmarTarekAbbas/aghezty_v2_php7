<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;
class Property extends Model
{
    use Translatable;
    protected $table="properties";
    protected $fillable = ['title','category_id'];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function pvalue()
    {
      return $this->hasMany(PropertyValue::class);
    }

}
