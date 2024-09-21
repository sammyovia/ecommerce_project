<?php

namespace App\Http\Controllers;

use App\Helpers\StripeClient;
use Illuminate\Support\Facades\Auth;

class CheckoutStripeController extends Controller
{
    public function index()
    {
        $cart_data = Auth::user()->products;
        $cart_data->calculateSubtotal();

        if ($cart_data->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Cart is Empty');
        }

        $YOUR_DOMAIN = url('');

        $stripe = StripeClient::getClient();

        // Source: https://stripe.com/docs/payments/accept-a-payment

        $checkout_session = $stripe->checkout->sessions->create([
          'line_items' => [[
            'price_data' => [
              'currency' => 'usd',
              'product_data' => [
                'name' => 'Checkout',
              ],
              'unit_amount' => $cart_data->getSubtotal() * 100,
            ],
            'quantity' => 1,
          ]],
          'mode' => 'payment',
          'success_url' => $YOUR_DOMAIN.'/checkout/success/stripe/{CHECKOUT_SESSION_ID}',
          'cancel_url' => $YOUR_DOMAIN.'/checkout',
        ]);

        header('HTTP/1.1 303 See Other');

        // header('Location: '.$checkout_session->url);
        return redirect($checkout_session->url);
    }
}
