<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
  protected $fillable = [
    'client_id', 'product_id'
  ];
  
}
