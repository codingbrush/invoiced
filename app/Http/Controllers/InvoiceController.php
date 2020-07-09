<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\InvoiceItem;
use App\Setting;
use DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoice, $customer, $setting;
    
    public function __construct(Invoice $invoice, Customer $customer, Setting $setting)
    {
        $this->customer = $customer;
        $this->invoice  = $invoice;
        $this->setting  = $setting;
    }

    public function index()
    {
        return view('invoices.index');
    }

    public function create()
    {
        $customers = $this->customer->all(['id', 'name']);
        $settings = $this->setting->all(['id','company']);
        return view('invoices.create', ['customers' => $customers,'settings' => $settings]);
    }

    public function show($id)
    {
        $invoices = $this->invoice->with('customer', 'invoiceItem','setting')->where('id', $id)->get();
        //dd($invoices);
        return view('invoices.show', ['invoices' => $invoices]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'title'        => 'required|string',
            'invoice_no'   => 'required|string',
            'customer_id'  => 'required',
            'invoice_date' => 'required',
            'due_date'     => 'required',
            'setting_id'   => 'required'
        ]);
        if (!$validated) {
            return redirect()->back()->withInput($request->all());
        }
        $invoice = $this->invoice->create([
            'invoice_no'   => $request->invoice_no,
            'invoice_date' => $request->invoice_date,
            'due_date'     => $request->due_date,
            'title'        => $request->title,
            'customer_id'  => $request->customer_id,
            'grand_total'  => $request->grand_total,
            'subtotal'     => $request->grand_total,
            'setting_id'   => $request->setting_id
        ]);
        if (!$invoice) {
            return redirect()->back()->withInput($request->all());
        }
        //$customer = Customer::where('id','=',$request->customer_id)->get();
        $latest = $this->invoice->latest()->first();
        $insert = DB::table('customer_invoice')->insert([
            'customer_id' => $request->customer_id,
            'invoice_id'  => $latest->id,
        ]);
        if ($insert) {
            for ($i = 0; $i < count($request->quantity); $i++) {
                InvoiceItem::create([
                    'invoice_id' => $latest->id,
                    'description' => $request->description[$i],
                    'quantity'    => $request->quantity[$i],
                    'unit_price'  => $request->unit_price[$i],
                    'total'       => $request->total[$i],
                ]);
            }
        }

        return redirect()->route('invoice.index');
    }

    public function edit($id)
    {
        $customers = $this->customer->all(['id', 'name']);
        $settings = $this->setting->all(['id','company']);
        $invoices = $this->invoice->with('customer','invoiceItem')->findOrFail($id);
        return view('invoices.edit',['invoices' => $invoices,'customers' => $customers,'settings' => $settings]);
    }

    public function getEditData($id)
    {
        $customers = $this->customer->all(['id', 'name']);
        $settings = $this->setting->all(['id','company']);
        $invoices = $this->invoice->with('customer','invoiceItem')->findOrFail($id);
        return view('invoices.edit',['invoices' => $invoices,'customers' => $customers,'settings' => $settings]);
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    public function destroy($id)
    {

    }

}
