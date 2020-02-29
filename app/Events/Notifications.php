<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Notifications implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $send_user;
    public $recive_user = [];
    public $link;
    public $seen;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$users=Null,$link)
    {
        $this->send_user    = \Auth::guard('client')->user() ? \Auth::guard('client')->user() :  auth()->user() ;
        if($users)
        {
          if(is_array($users))
          {
            foreach ($users as $current_user) {
              array_push($this->recive_user,$current_user);
            }
          }
          else
          {
            array_push($this->recive_user,$users->id);
          }
        }
        else
        {
          $all_user = \App\User::all();
          foreach ($all_user as $current_user) {
            array_push($this->recive_user,$current_user->id);
          }
        }
        $this->message      = $message;
        $this->link         = $link;
        $this->seen         = 0;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channels = [];
        foreach ($this->recive_user as $user) {
            array_push($channels, new PrivateChannel('notification.'.$user));
        }
        return $channels;
    }

    public function broadcastAs() {
        return 'notify-event';
    }
}
