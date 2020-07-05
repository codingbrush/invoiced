<?php

namespace App\Http\Controllers;

use DB;
use App\Invoice;
use App\Setting;
use App\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoice,$customer;
    public function __construct(Invoice $invoice,Customer $customer,Setting $setting)
    {
        $this->customer = $customer;
        $this->invoice = $invoice;
        $this->setting = $setting;
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
        $invoices = $this->invoice->with('customer','invoiceItem')->where('id','=',$id)->get(); 
        // DB::table('customer_invoice')
        //             ->join('customers','customers.id','=','customer_invoice.customer_id')
        //             ->join('invoices','invoices.id','=','customer_invoice.invoice_id')
        //             ->join('invoice_items','invoice_items.invoice_id','=','customer_invoice.invoice_id')
        //             //->select('invoices.*','invoice_items.*','customers.*')
        //             ->where('customer_invoice.invoice_id','=',$id)
        //             ->get();
                   //dd($invoices);
        $settings = $this->setting->all();
        return view('invoices.show',['invoices' => $invoices,'settings' => $settings]);
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
