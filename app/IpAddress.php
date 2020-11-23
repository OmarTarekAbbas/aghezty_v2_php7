<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
  protected $table = 'ip_address';
  protected $fillable = ['ip'];

}
