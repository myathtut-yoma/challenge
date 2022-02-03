<?php

namespace App\Services\InternetServiceProvider;

class TelecomInvoice implements InvoiceProviderInterface
{
    protected $monthlyFeesMpt = 200;
    protected $monthlyFeesooredoo = 150;

    public function calculateTotalAmount(string $month, string $provider)
    {
        switch ($provider) {
            case "mpt":
                return $month * $this->monthlyFeesMpt;
            default:
                return $month * $this->monthlyFeesooredoo;
        }

    }
}