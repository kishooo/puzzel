<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ufida</title>
        <link href="{{asset('/assets/styles/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/assets/scripts/bootstrap.bundle.min.js')}}"></script>

        <link rel="icon" href="#">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{asset('/assets/styles/style_sheet.css')}}">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navbar" dir="rtl">
            <div class="logo">
                <img src="{{asset('/assets/images/logo.png')}}">
            </div>
            <nav>
                <ul id="MenuItems" >
                    <li><a href="/arHomePage">الرئيسية</a></li>
                    <li><a href="#About">من نحن</a></li>
                    <li><a href="#Brand">لامسة</i></a></li>
                    <li><a href="#Brand">كلورينا</i></a></li>
                    <li><a href="#Brand">تجملي</i></a></li>
                    <li><a href="#contact">تواصل</a></li>
                    <li class="bt"><a style="color:#338f60" href="/online/arlogin" class="button-j">تسجيل </a></li>
                    <li><a href="/HomePage">English</a></li>
                </ul>
            </nav>
            <a href="/HomePage/category/arShowCart/1"><img class="shopping-bag" src="{{asset('/images/shopping-bag.png')}}" ></a>
            <img src="{{asset('/images/menu.png')}}" class="menu-icon" onclick="menudropper()">

        </div>

        @yield('content')

        <!-----------footerr------>
        <div class="footerr" id="contact">
            <div class="container">
                <div class="row col-12 col-sm-12">
                    <div class="footerr-col-2 col-6 col-sm-12">
                        <p>هدفنا هو تحقيق الرضا و <br> اجعل منتجنا في متناول الكثيرين</p>
                        <a href="https://www.facebook.com/Ufida.for.Chemical.Industry"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-google" ></i></a>
                        <p>info@Lectio.com</p>
                        <p>+20 152 125 9541</p>
                    </div>


                </div>
                <hr>
                <p class="copyright">&#169; Copyright 2021</p>
            </div>
        </div>


          <!-------javascript for drop menu------->
          <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight="0px";
            function menudropper(){
                if( MenuItems.style.maxHeight == "0px"){
                   MenuItems.style.maxHeight="200px";
                   MenuItems.style.color="#000";
                }
                else{
                    MenuItems.style.maxHeight="0px";
                }

            }

        </script>
  <script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicatorar = document.getElementById("indicatorar");
    

    function register(){
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicatorar.style.transform ="translateX(50px)";
    }

    function login(){
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicatorar.style.transform ="translateX(180px)";
    }
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight="0px";
    function menudropper(){
        if( MenuItems.style.maxHeight == "0px"){
           MenuItems.style.maxHeight="500px";
        }
        else{
            MenuItems.style.maxHeight="0px";
        }
    
    }

</script>
        </body>
    </html>