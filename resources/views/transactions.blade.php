<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree-Demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
          ._width40 {
            width:40px;
        }
        ._width120 {
            width:120px;
        }
        ._width200 {
            width:200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th class="_width200">Id Txn</th>
                    <th class="_width40">Logo</th>
                    <th class="_width120">Type</th>
                    <th class="_width200">Number</th>
                    <th class="_width120">Expiration Date</th>
                    <th class="_width120">Amount</th>
                    <th class="_width200">Insert Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collection as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ $item->creditCardDetails->imageUrl }}" width="30px"></td>
                    <td>{{ $item->creditCardDetails->cardType }}</td>
                    <td>{{ $item->creditCardDetails->maskedNumber }}</td>
                    <td>{{ $item->creditCardDetails->expirationDate }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->createdAt)->format('d/m/Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
  </body>