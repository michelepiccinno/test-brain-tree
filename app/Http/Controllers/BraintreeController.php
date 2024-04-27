<?php

namespace App\Http\Controllers;

use App\Http\Requests\BraintreeRequest;
use Braintree\CreditCard;
use Braintree\TransactionSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\select;

class BraintreeController extends Controller
{

    public function token(Request $request)
    {
        //la prima volta prendo l'id passato dalla vista, la seconda volta prendo l'id memorizzato nella sessione
        $productId = $request->input('id') ?? $request->session()->get('productId');
        
        //salvo il valore di $productId in sessione con la chiave 'productId'
        $request->session()->put('productId', $productId);
        
        //query DB per recuperare il prezzo
        $productPrice =  DB::table('products')->select('price')->where('id', '=', $productId)->pluck('price')->first();
        
        //log per debugging
        Log::info("Prezzo del prodotto: " . $productPrice);

        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        if ($request->input('nonce') != null) {
            $nonceFromTheClient = $request->input('nonce');

            $gateway->transaction()->sale([
                'amount' =>  $productPrice,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            return view('welcome');
        } else {
            $clientToken = $gateway->clientToken()->generate();

            return view('braintree', [
                'token' => $clientToken,
                'productId' => $productId,
                'productPrice' => $productPrice,
            ]);
        }
    }

    //LISTA DELLE TRANSAZIONI EFFETTUATE
    public function index(Request $request)
    {

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
        return view('transactions', ['token' => $clientToken, 'collection' => $collection]);
    }
}
