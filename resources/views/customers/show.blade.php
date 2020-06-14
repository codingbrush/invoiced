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
                @if ($customers->invoice->isEmpty())
                            <a href="{{route('invoice.create')}}" class="btn btn-primary text-center">Create Invoice</a>
                        @else
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
                        <th>Modify</th>
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
                            <td>
                                <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-outline-info btn-sm"><svg class="bi bi-person-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                                  </svg></a>
                            </td>
                        </tr>
                    
                    @endforeach
                      
                       
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
