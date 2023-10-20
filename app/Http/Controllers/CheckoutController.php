<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processOrder(Request $request)
    {
        // Validate the form data as needed
        $userID = $request->input('user_id');
        $orders = $request->input('orders');
        $total = $request->input('total');

        // Create a new order
            $order = new Order();
            $order->user_id = $userID;
            // $order->pesanan_1 = $orders[0]->name;
            // $order->pesanan_2 = $orders[1]->name;
            // $order->pesanan_3 = $orders[2]->name;
            // $order->pesanan_4 = $orders[3]->name;
            // $order->pesanan_5 = $orders[4]->name;
            // $order->quantity_1 = $orders[0]->quantity;
            // $order->quantity_2 = $orders[1]->quantity;
            // $order->quantity_3 = $orders[2]->quantity;
            // $order->quantity_4 = $orders[3]->quantity;
            // $order->quantity_5 = $orders[4]->quantity;
            // $order->total = $orders[0]->quantity;

            for ($i = 0; $i < count($orders); $i++) {
                $order->setAttribute("pesanan_" . ($i + 1), $orders[$i]['name']);
                $order->setAttribute("quantity_" . ($i + 1), $orders[$i]['quantity']);
            }
            $order->total = $total;
            $order->save();

        // Clear the user's shopping cart (you might have it stored in the session)

        // Redirect to a thank you page or any other desired page
        return redirect()->route('dashboard')->with('success', 'Pesanan Anda telah diterima.');
    }
}
