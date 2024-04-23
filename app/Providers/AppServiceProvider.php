<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Gateway::class, function($app){
                return new Gateway(
                    [
                        'environment' => 'sandbox',
                        'merchantId' => 'ywjkg2tk4jzvfd7x',
                        'publicKey' => 'h53wr49mnr5hmp53',
                        'privateKey' => '08385bec974adff9e78c5d33f5f17e6c'
                    ]
                );
            }
        );
    }
}
