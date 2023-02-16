<?php

namespace App\Http\Controllers;

use App\Events\ApplicationChat;
use App\Events\NewMessages;
use App\Models\Customer;
use App\Notifications\UserNotifications;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function event(){
        $customer = Customer::first();
//        $customer->notify(new UserNotifications([
//            'message'=>fake()->text(100),
//            'self'=>rand(0,1)
//        ]));
        event(new ApplicationChat($customer));
        event(new NewMessages($customer));

    }
    public function chat(){
        $customers = Customer::with('notifications')->get();
        return view('chat',compact('customers'));
    }

    public function messages(Customer $customer){
        $customers = Customer::with('notifications')->get();
        $messages = $customer->notifications;

        $messages = $messages->sortBy(function ($col) {
            return $col->created_at->timestamp;
        });

        return view('chat',compact('messages','customers','customer'));
    }
}
