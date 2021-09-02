@extends('userInterface.header')
@section('content')
 <!---Login/Registration-->
 <div class="account_page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Log in</span>
                        <span onclick="register()">Register</span>
                        <hr id="indicator">
                    </div>
                    <form id="LoginForm" action="/online/login" method="post">
                      @csrf
                        <input type="text" placeholder="Username" name="email">
                        <input type="password" placeholder="Password" name="Password">
                        <button type="submit" class="btn">Log in</button>
                        <a href="">Forget Password?</a>
                    </form>

                    <form id="RegForm" action="/online/Register" method="post">
                      @csrf
                        <input name="name" type="text" placeholder="Username">
                        <input name="email" type="email" placeholder="Email">
                        <input name="Password" type="password" placeholder="Password">
                        <button type="submit" class="btn">Register</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
							@foreach($errors->all() as $error)
							  {{ $error }}<br>
							@endforeach
							@endif
</div>
@endsection
