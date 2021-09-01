@extends('userInterface.header')
@section('content')

<div class="card order">
    <h3>Shipping details</h3>
    <form action="/HomePage/products/Order" method="post">
      @csrf
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input  name="name" type="text" class="form-control" value="{{Auth::user()->name}}" id="formGroupExampleInput" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Mobile</label>
          <input name="mobile" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter mobile number">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Telephone number</label>
            <input name="Telephone" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter Telephone number">
          </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input name="email" type="text" value="{{Auth::user()->email}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter your Email">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">City</label>
            <input name="city" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your city">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Address</label>
            <input name="address" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your address in details">
          </div>
          <button type="submit" class="button">confirm</button>
      </form>
  </div>






@endsection
