<?php

namespace App\Http\Controllers;

use App\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{

    public $invoiceitem;

    public function __construct(InvoiceItem $invoiceItem) {
        $this->invoiceitem = $invoiceItem;
    }

    public function index()
    {
        $invoiceitems = $this->invoiceitem->with('invoice')->paginate(10);
        return response()->json(['invoiceitem' =>$invoiceitems]);
    }
}
