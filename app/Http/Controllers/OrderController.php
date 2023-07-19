<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
        $orders = Order::find(1);
        dump($orders->fio);
        dump($orders->email);
        dump($orders->phone);
        dump($orders->comment);
    }
}
