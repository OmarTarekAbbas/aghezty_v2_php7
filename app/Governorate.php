<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = ['title_en', 'title_ar'];

    public function cities()
    {
      return $this->hasMany('App\City','governorate_id','id');
    }
}
