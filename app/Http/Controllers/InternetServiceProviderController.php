<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\InvoiceRequest;
use App\Services\InternetServiceProvider\InvoiceProviderInterface;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    use ResponseTrait;
    private $invoiceProvider;

    /**
     * InternetServiceProviderController constructor.
     * @param InvoiceProviderInterface $invoiceProvider
     */
    public function __construct(InvoiceProviderInterface $invoiceProvider)
    {

        $this->invoiceProvider = $invoiceProvider;

    }

    public function getMptInvoiceAmount(InvoiceRequest $request)
    {
        return $this->invoiceResponse($this->invoiceProvider->calculateTotalAmount($request->get('month'), 'mpt'));
    }

    public function getOoredooInvoiceAmount(Request $request)
    {
        return $this->invoiceResponse($this->invoiceProvider->calculateTotalAmount($request->get('month'), 'ooredoo'));
    }
}
