<?php

namespace App\Http\Controllers;

use App\Helpers\StripeClient;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

class CheckoutPaymentController extends Controller
{
    public function index($payment, $id)
    {
        // Get user
        $user = Auth::user();

        // Get products
        $cart_data = $user->products;

        // Check if cart is empty
        if ($cart_data->isEmpty()) {
            echo 'Cart is empty';
            // return redirect()->route('cart.index')->with('message', 'Unable to perform checkout');
            exit;
        }

        // Calcuate subtotal
        $cart_data->calculateSubtotal();

        // Start stripe codes
        $stripe = StripeClient::getClient();

        // Get session
        $checkout_session = $stripe->checkout->sessions->retrieve($id, []);

        // Check if completed
        $completed = ($checkout_session->status = 'complete' && $checkout_session->payment_status = 'paid') ? true : false;

        // Extract data
        $data['subtotal'] = $checkout_session->amount_subtotal / 100;
        $data['total'] = $checkout_session->amount_total / 100;
        $data['payment_provider'] = 'stripe';
        $data['payment_id'] = $checkout_session->id;

        // Add user id
        $data['user_id'] = Auth::id();

        // Check if payment was completed
        if (empty($completed) || empty($data)) {
            echo 'Payment process not completed';
            exit;
        }

        // Create order
        // $order = Order::create([
        //     'user_id' => $data['user_id'],
        //     'subtotal' => $data['subtotal'],
        //     'total' => $data['total'],
        //     'payment' => $data['payment'],
        //     'payment_id' => $data['payment_id'],
        // ]);

        $order = new Order();
        $order->user_id = $data['user_id'];
        $order->subtotal = $data['subtotal'];
        $order->total = $data['total'];
        $order->payment_provider = $data['payment_provider'];
        $order->payment_id = $data['payment_id'];
        $order->save();

        // dd('stop');

        // Create order details
        $records = [];
        $cart_data->each(function ($data) use (&$records) {
            array_push($records,
                new OrderProduct([
                    'product_id' => $data->id,
                    'price' => $data->price,
                    'quantity' => $data->pivot->quantity,
                ])
            );
        });

        // insert all records for order_products
        $order->order_products()->saveMany($records);

        // Remove all user cart products
        $user->products()->detach();

        // redirect to another page
        return redirect()->route('checkout.success')->with('message', 'Thank you for the purchase');
    }
}
