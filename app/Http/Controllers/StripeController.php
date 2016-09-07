<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Stripe\Stripe;

class StripeController extends Controller
{
    public function store()
    {
    	Stripe::setApiKey(env('STRIPE_SECRET'));

		// Get the credit card details submitted by the form
		$token = Input::get('stripeToken');

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
			$charge = Stripe_Charge::create(array(
			  "amount" => 1000, 
			  "currency" => "usd",
			  "card"  => $token,
			  "description" => 'Charge for my product')
			);

			$paymentid     = $charge->id;
			$payerid       = $charge->source->id;
			$status        = $charge->status;
			// if status="succeeded" do rest of the insert operation start

			// end

		} catch(Stripe_CardError $e) {
			$e_json = $e->getJsonBody();
			$error = $e_json['error'];
		  	// The card has been declined
		  	// redirect back to checkout page

			return Redirect::to('/')
				->with_input()
				->with('card_errors'=>$error);
		}

    }
}
