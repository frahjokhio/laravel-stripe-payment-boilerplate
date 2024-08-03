<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeElementController extends Controller
{

    /**
     *   Show the Stripe Element.
    */

    public function index()
    {
        return view('stripe-element.index');
    }

    /**
     *   Generate Client Secret for Stripe Element.
    */

    public function getClientSecret()
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        try {

            // Create a PaymentIntent with amount and currency
            $paymentIntent = $stripe->paymentIntents->create([

                'amount' => 100, // 100 cents equal to 1 dollar
                'currency' => 'usd',

                /* In the latest version of the API, 
                specifying the `automatic_payment_methods` parameter is optional because Stripe 
                enables its functionality by default. 
                */

                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            // return client secret 
            return response()->json($output);
        } catch (Exception $e) {

            // return error 
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
