<?php

namespace App\Services\InternetServiceProvider;

interface InvoiceProviderInterface
{

    public function calculateTotalAmount(string $month, string $provider);
}