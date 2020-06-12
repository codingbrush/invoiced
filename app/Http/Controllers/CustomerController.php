<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

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
	}
	
	public function show($id)
	{
		
	}
}
