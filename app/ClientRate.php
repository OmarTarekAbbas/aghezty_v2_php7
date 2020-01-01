<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRate extends Model
{
    protected $fillable = ['product_id', 'client_id', 'rate' , 'comment' , 'publish'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }
}
