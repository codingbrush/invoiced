<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoice,$customer;
    public function __construct(Invoice $invoice,Customer $customer)
    {
        $this->customer = $customer;
        $this->invoice = $invoice;
    }

    public function index()
    {
        return view('invoices.index');
    }

    public function create()
    {
        $customers = $this->customer->all(['id','name']);
        return view('invoices.create',compact('customers',$customers));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show($id)
    {
        $invoices = $this->invoice->with('invoiceItem')->findOrFail($id);
        //dd($invoices);
        return view('invoices.show',compact('invoices',$invoices));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request,$id)
    {
        
    }

    public function destroy($id)
    {
        
    }
    
}
