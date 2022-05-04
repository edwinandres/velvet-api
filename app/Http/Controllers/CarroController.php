<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarroController extends Controller
{
    //

    public function llamarCheckout(Request $request){
        $stripe = new \Stripe\StripeClient(
            'sk_test_51Knu6CD9CNNKm4vlc02NMSCddauEDOLAgGW1KltSQ1srHr73eP42J450IFqzAZu4pWfmpsUrPlQBrxwy1NxvWFZq00Xkp59eNR'
        );
        $stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => [
                [
                    'price' => 'price_H5ggYwtDq4fbrJ',
                    'quantity' => 2,
                ],
            ],
            'mode' => 'payment',
        ]);
    }
}
