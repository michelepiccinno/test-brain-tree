<?php

namespace App\Http\Controllers;

use Braintree\CreditCard;
use Braintree\TransactionSearch;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function token(Request $request){

        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
    
        if($request->input('nonce') != null){
            $nonceFromTheClient = $request->input('nonce');
    
            $gateway->transaction()->sale([
                'amount' => '17.00',
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                'submitForSettlement' => True
                ]
            ]);
            return view ('welcome');
        }else{
            $clientToken = $gateway->clientToken()->generate();
            return view ('braintree',['token' => $clientToken]);
        }
    }

    //LISTA DELLE TRANSAZIONI EFFETTUATE
    public function index(Request $request){

        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $collection = $gateway->transaction()->search([

           TransactionSearch::creditCardCardType()->in(CreditCard::allCardTypes())
          ]);
          
            $clientToken = $gateway->clientToken()->generate();
            return view ('transactions',['token' => $clientToken, 'collection' => $collection]);
        
    }
}
