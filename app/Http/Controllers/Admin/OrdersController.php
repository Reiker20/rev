<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function orders()
    {
        $orders = Order::with(['user', 'menu'])->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }
}
