@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('customer.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Route::is('customer.create') ? old('name') : $customers->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{ Route::is('customer.create') ? old('company') : $customers->company }}">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="{{ Route::is('customer.create') ? old('address') : $customers->address }}">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ Route::is('customer.create') ? old('phone') : $customers->phone }}">
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>
    </div>

@endsection
