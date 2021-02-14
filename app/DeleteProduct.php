<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class DeleteProduct extends Model
{
  protected $table = 'delete_products';
  protected $fillable = ['product_id' ,'category_id'];
}
