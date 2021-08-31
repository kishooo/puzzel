@extends('userInterface.header')
@section('content')

<div class="card order">
    <h3>Shipping details</h3>
    <form>
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Mobile</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter mobile number">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Telephone number</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter Telephone number">
          </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your Email">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">City</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your city">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Address</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter your address in details">
          </div>
          <button type="submit" class="button">confirm</button>
      </form>
  </div>






@endsection