<?php

namespace App\Providers;


use App\Services\InternetServiceProvider\InvoiceProviderInterface;
use App\Services\InternetServiceProvider\TelecomInvoice;
use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(InvoiceProviderInterface::class, TelecomInvoice::class);

    }
}
