@extends('userInterface.header')
@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('/assets/images/COVER1-Eng.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('/assets/images/COVER2-Eng.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('/assets/images/COVER3-Eng.jpg')}}" alt="Third slide">
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
                  <h2 class="title">Our Products</h2>
                    <div class="row col-12">
                      @foreach($categories as $category)
                        <div class="col-3">
                            <a href="/HomePage/category/{{$category->categoryId}}"> <img class="responsive" src="{{'data:image/png;base64,'.base64_encode( $category->smallImage ).' '}}"></a>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>

            <!------------featured product---------->
            <div class="small-container" id="product">
                <h2 class="title">Featured Products</h2>
                <div class="row">
                  @php($i=0)
            @foreach($products as $product)
            <div class="col-4">
                        @if (Auth::user())
                        <a href="/online/ShowProducts/{{$product->id}}/{{Auth::user()->id}}"><img src="{{ asset('images/'. $product->image) }}" /></a>
                        <a href="/online/ShowProducts/{{$product->id}}/{{Auth::user()->id}}"><h5>{{$product->title}}</h5></a>
                        @else
                        <a href="/online/ShowProducts/{{$product->id}}/visitor"><img src="{{ asset('images/'. $product->image) }}" /></a>
                        <a href="/online/ShowProducts/{{$product->id}}/visitor"><h5>{{$product->title}}</h5></a>
                        @endif
                        <h6>{{$product->price}} EGP</h6>
                        @if(Auth::user)
                        <form method="post" action="/HomePage/{{$product->id}}/{{Auth::user()->id}}">
                        @endif
                          @csrf
                            <button type="submit" id="submit{{$i}}" class="button">Add to cart</Button>
                        </form>

                    </div>
                    @php($i++)
            @endforeach
            @php($i=0)

            </div>


            </div>





</div>
            <!---------offer--------->
            <div class="offer">
              <div class="small-container">
                  <div class="row">
                      <div class="col-2">
                          <img src="{{asset('/assets/images/ufida.png')}}" class="offer-img responsive">
                      </div>
                      <div class="col-2">
                          <p>Exlusively Avaliable</p>
                          <h1>Smart band 4</h1>
                          <small>blah blah blah vgvhchffgfhjcgghggggf gyfgjgghvgvhjdhiufhkjj hfdjfhgduyfhsjkd</small>
                          <a href="#" class="button">Buy Now</a>
                      </div>
                  </div>
              </div>
          </div>


    <!-------------Feed Backs---------->
    <div class="feedback">
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
      <div class="row">
          <div class="about" id="About">
              <h1>About Us <span><br>Ufida For Chemical Industries</span></h1>
              <p>Ufida is a leading company in the field of industrial detergents over products are of high quality
                  and competitively priced locally and conforming to European standards and public health and safety standards.
                  We strive to develop with over expertise and competencies that allows to always providing the best and we have
                  contributed to the Egyptian market, with over products by supplying to hypermarkets, hospitals, restaurants and hotels.
              </p>
              <a href="online/login" class="button">Get Started </a>
          </div>
          <div class="about">
              <img src="{{asset('/assets/images/ufida.png')}}">
          </div>
      </div>


  </div>

    @endsection
