<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

/* class OrderController extends Controller
{
    public function index() 
    {
    $payload = 'ciao sono product controller index';
    var_dump($payload);
    return $payload;
    }
} */

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $clientToken = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $clientToken
        ];
        return  response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => "transazione eseguita"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "transazione fallita"
            ];
            return response()->json($data, 401);
        }
    }
}
