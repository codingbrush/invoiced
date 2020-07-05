<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class CustomerController extends Controller
{
	public $customer;

	public function __construct(Customer $customer) {
		$this->customer = $customer;
	}

    public function index()
	{
		return view('customers.index');
	}

	public function create()
	{
	    return view('customers.create');
	}

	public function show($id)
	{
        $customers = $this->customer->with('invoice')->findOrFail($id);
        //  DB::table('customer_invoice')
        // ->join('customers','customers.id','=','customer_invoice.customer_id')
        // ->join('invoices','invoices.id','=','customer_invoice.invoice_id')
        // ->join('invoice_items','invoice_items.invoice_id','=','customer_invoice.invoice_id')
        // //->select('invoices.*','invoice_items.*','customers.*')
        // ->where('customer_invoice.customer_id','=',$id)
        // ->get();
        //$this->customer->with('invoice')->findOrFail($id);
	    //dd($customers);
        return view('customers.show',compact('customers',$customers));
    }
    
    public function edit($id)
    {
        $customers = $this->customer->findOrFail($id);
	    //dd($customers);
        return view('customers.create',compact('customers',$customers));
    }

	public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'address' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'required',
        ]);
        if(!$validated)
        {
            return back()->withInput();
        }
        $customers = $this->customer->create($request->all());
        if (!$customers)
        {
            session()->flash('Error','Storage Error');
            return back()->withInput();
        }
        //$customers->invoice()->attach($invoice->id);
        return redirect()->route('customer.index');
    }
}
