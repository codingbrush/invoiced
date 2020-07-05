@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Company Name <span class="dot"></span></label>
                <input type="text" class="form-control" id="company" name="company">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Issuer</label>
                <input type="text" class="form-control" id="name" name="issuer">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address <span class="dot"></span></label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputAddress2">Telephone </label>
                <input type="tel" class="form-control" id="telephone" placeholder="Apartment, studio, or floor" name="telephone">
                </div>
                <div class="form-group col-md-6">
                <label for="inputAddress2">Phone </label>
                <input type="tel" class="form-control" id="telephone" placeholder="Apartment, studio, or floor" name="phone">
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Website</label>
                <input type="text" class="form-control" name="website">
              </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Logo</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo">
                  </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Company</button>
          </form>
    </div>
@endsection