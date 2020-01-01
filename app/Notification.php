<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['notifier_id','notified_id', 'subject' ,'link' , 'seen'];

    public function recv_user()
    {
        return $this->belongsTo('App\User','notified_id');
    }

    public function send_user()
    {
        return $this->belongsTo('App\Client','notifier_id');
    }
}
