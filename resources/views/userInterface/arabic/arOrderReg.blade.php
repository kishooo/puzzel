@extends('userInterface.arabic.arheader')
@section('content')

<div class="card arorder order">
    <h3>تفاصيل التوصيل</h3>
    <form action="/ARHomePage/ARproducts/AROrder" method="post">
      @csrf
        <div class="form-group">
          <label for="formGroupExampleInput">الأسم</label>
          <input name="name" type="text" class="form-control" value="{{Auth::user()->name}}" id="formGroupExampleInput" placeholder="إدخل الإسم">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">رقم الموبيل</label>
          <input name="mobile" type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل رقم الموبيل">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">الرقم الأرضي</label>
            <input name="Telephone" type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل رقم الأرضي">
          </div>

        <div class="form-group">
            <label for="formGroupExampleInput2">الايمال الالكتروني</label>
            <input name="email" type="text" value="{{Auth::user()->email}}" class="form-control" id="formGroupExampleInput2" placeholder="إدخل الايمال الالكتروني">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">المحافظة</label>
            <input name="city" class="form-control" id="formGroupExampleInput2" placeholder="إدخل المحافظة">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">العنوان</label>
            <input name="address" type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل العنوان بالتفاصيل">
          </div>
          <button type="submit" class="button">تأكيد</button>
      </form>
  </div>






@endsection
