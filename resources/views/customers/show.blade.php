@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Customer Details -->
                <div class="row">
                    <div class="col">
                        <label class="text-muted">Name:</label>
                        <span>{{$customers->name}}</span>
                        <br>
                        <label class="text-muted">Company Name:</label>
                        <span>{{$customers->company}}</span>
                    </div>
                    <div class="col">
                        <label class="text-muted">Address:</label>
                        <span>{{$customers->address}}</span>
                   <br>
                        <label class="text-muted">Phone:</label>
                        <span>{{$customers->phone}}</span>
                    </div>
                </div>
                <!-- Customer invoices -->
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Discount</th>
                        <th>SubTotal</th>
                        <th>GrandTotal</th>
                        <th>Created On</th>
                        </thead>
                        <tbody>
                        @foreach($customers->invoice as $invoice)
                        <tr>
                            <td>{{$invoice->invoice_no}}</td>
                            <td>{{$invoice->title}}</td>
                            <td>{{$invoice->invoice_date}}</td>
                            <td>{{$invoice->due_date}}</td>
                            <td>{{$invoice->discount}}</td>
                            <td>{{$invoice->subtotal}}</td>
                            <td>{{$invoice->grand_total}}</td>
                            <td>{{$invoice->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
