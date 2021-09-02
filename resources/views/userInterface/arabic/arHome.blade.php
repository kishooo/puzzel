@extends('userInterface.arabic.arheader')
@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('/assets/images/COVER1-Arabic.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('/assets/images/COVER2-Arabic.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('/assets/images/COVER3-Arabic.jpg')}}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container">
             <!------------Brands----------------->
             <div id="Brand" class="Brands">
                <div class="small-container">
                  <h2 class="title">منتاجتنا</h2>
                    <div class="row col-12">
                      @foreach($categories as $category)
                        <div class="col-3">
                            <a href="/ARHomePage/ARcategory/ARproducts/{{$category->categoryId}}"> <img class="responsive" src="{{'data:image/png;base64,'.base64_encode( $category->smallImage ).' '}}"></a>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>

            <!------------featured product---------->
            <div class="small-container" id="product">
                <h2 class="title">منتجات مميزة</h2>
                <div class="row" >
            @foreach($products as $product)
            <div class="col-4">
                        <a href="/ARonline/ARShowProducts/{{$product->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $product->image ).' '}}" /></a>
                        <a href="/ARonline/ARShowProducts/{{$product->id}}"><h5>{{$product->title}}</h5></a>
                        <h6>{{$product->price}} EGP</h6>
                        @if(Auth::user())
                        <form method="post" action="/ARHomePage/{{$product->id}}/{{Auth::user()->id}}">
                          @csrf
                            <button type="submit" class="button">أضف إلى السلة</Button>
                        </form>
                        @else
                        <a href="ARonline/login" class="button">سجل الدخول للاضفه</a>
                        @endif
                    </div>

            @endforeach
            </div>
            </div>





</div>
            <!---------offer--------->
            <div class="offer" dir="rtl">
              <div class="row" dir="rtl">
                  <div class="about" id="About">
                      <h1>من نحن <span><br>يوفيدا للصناعات الكيماوية</span></h1>
                      <p>يوفيدا هي شركة رائدة في مجال المنظفات الصناعية على منتجات ذات جودة عالية
                        وبأسعار تنافسية محليا ومطابقة للمعايير الأوروبية ومعايير الصحة والسلامة العامة.
                        نحن نسعى جاهدين للتطوير بأكثر من الخبرة والكفاءات التي تسمح دائمًا بتقديم الأفضل ولدينا
                        ساهمت في السوق المصري بأكثر من المنتجات من خلال التوريد لمحلات السوبر ماركت والمستشفيات والمطاعم والفنادق.
                      </p>
                      <a href="online/login" class="button">سجل الدخول </a>
                  </div>
                  <div class="about">
                      <img src="{{asset('/assets/images/ufida.png')}}">
                  </div>
              </div>
          </div>


    <!-------------Feed Backs---------->
    <div id="review" class="feedback">
        <div class="small-container">
            <div class="row">
          @foreach($reviews as $review)

                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>{{$review->title}}</p>

                    <img src="Fathala.jpg">
                    <h3>{{$review->name}}</h3>
                </div>

            @endforeach
            </div>
        </div>
      </div>
      <!---------About Us----->



  </div>
    @endsection
