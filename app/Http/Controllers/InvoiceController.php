<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoice;
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function index()
    {
        return view('invoices.index');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
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
