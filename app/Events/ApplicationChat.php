<?php

namespace App\Events;


use App\Models\Customer;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use ProtoneMedia\Splade\Facades\Splade;

class ApplicationChat implements ShouldBroadcast
{
    public function __construct(public $customer)
    {
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user-'.$this->customer->id);
    }
//    public function broadcastAs()
//    {
//        return 'chat';
//    }
    public function broadcastWith()
    {
        return [
            'number'=>$this->customer->unreadNotifications()->count()+1,
            Splade::toastOnEvent('High server load detected'),
//            Splade::refreshOnEvent(),
        ];
    }


}
