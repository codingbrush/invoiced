@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{Route::is('settings.create') ? route('settings.store') : route('settings.update',$settings->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(Route::is('settings.edit')) @method('PUT') @endif
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Company Name <span class="dot"></span></label>
                <input type="text" class="form-control" id="company" name="company"
                value="{{ Route::is('settings.create') ? old('company') : $settings->company }}">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Issuer</label>
                <input type="text" class="form-control" id="name" name="issuer"
                value="{{ Route::is('settings.create') ? old('company') : $settings->company }}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address <span class="dot"></span></label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address"
              value="{{ Route::is('settings.create') ? old('address') : $settings->address }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputAddress2">Telephone </label>
                <input type="tel" class="form-control" id="telephone" placeholder="Apartment, studio, or floor" name="telephone" 
                value="{{ Route::is('settings.create') ? old('telephone') : $settings->telephone }}">
                </div>
                <div class="form-group col-md-6">
                <label for="inputAddress2">Phone </label>
                <input type="tel" class="form-control" id="telephone" placeholder="Apartment, studio, or floor" name="phone"
                value="{{ Route::is('settings.create') ? old('phone') : $settings->phone }}">
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                value="{{ Route::is('settings.create') ? old('email') : $settings->email }}">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Website</label>
                <input type="text" class="form-control" name="website"
                value="{{ Route::is('settings.create') ? old('website') : $settings->website }}">
              </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Logo</label>
                    <span class="ml-4 text-info">{{ Route::is('settings.create') ? old('logo') : $settings->logo }}</span>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ Route::is('settings.create')? 'Create Company' : 'Update Company' }}</button>
          </form>
    </div>
@endsection