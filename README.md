# Laravel Stripe
Example on how to integrate stripe payment gateway in laravel 5.3 

#Instructions
(1) Login to stripe and go to Create new account. Then select the account you created. Go to Account settings->API Keys.

(2) Copy the Test Secret Key and Test Publishable Key (Use Live keys for the real environment).

(3) open .env file and add
	STRIPE_SECRET             = YOUR SECRET KEY (sk_----)
	STRIPE_PUBLISHABLE_SECRET = YOUR PUBLISHABLE KEY (pk_----)

(4) open composer.json and as below
	"require": 
	{
        "php": ">=5.6.4",
        "laravel/framework": "5.3.*",
        "stripe/stripe-php": "3.*"
    	}

(5) Run below command:
	composer update

(6) Go to https://stripe.com/docs/checkout/tutorial and copy the form tag. Put it in your view. 
    Change the action method to your custom one.

(7) Go to the controller and view the rest of the code