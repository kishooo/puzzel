@extends('userInterface.arabic.arheader')
@section('content')

<div class="card arorder order">
    <h3>تفاصيل التوصيل</h3>
    <form>
        <div class="form-group">
          <label for="formGroupExampleInput">الأسم</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="إدخل الإسم">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">رقم الموبيل</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل رقم الموبيل">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">الرقم الأرضي</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل رقم الأرضي">
          </div>
       
        <div class="form-group">
            <label for="formGroupExampleInput2">الايمال الالكتروني</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل الايمال الالكتروني">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">المحافظة</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل المحافظة">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">العنوان</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="إدخل العنوان بالتفاصيل">
          </div>
          <button type="submit" class="button">تأكيد</button>
      </form>
  </div>






@endsection