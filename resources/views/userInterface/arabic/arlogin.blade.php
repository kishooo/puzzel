@extends('userInterface.arabic.arheader')
@section('content')
 <!---Login/Registration-->
 <div class="account_page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">  تسجيل الدخول</span>
                        <span onclick="register()">تسجيل جديد</span>
                        <hr id="indicatorar">
                    </div>
                    <form id="LoginForm" dir="rtl">
                        <input type="text" placeholder="اسم المسخدم">
                        <input type="password" placeholder="كلمه السر">
                        <button type="submit" class="btn">تسجيل الدخول</button>
                    </form>

                    <form id="RegForm" dir="rtl">
                        <input type="text" placeholder="اسم المسخدم">
                        <input type="email" placeholder="البريد الإلكتروني">
                        <input type="password" placeholder="كلمه السر">
                        <button type="submit" class="btn">تسجيل  جديد</button>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
