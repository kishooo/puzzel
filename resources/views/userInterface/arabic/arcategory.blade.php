@extends('userInterface.arabic.arheader')
@section('content')
            <img src="{{asset('/images/Banner-Clorina.jpg')}}" class="pic">

            <!--------------products-->
            <div class="small-container">

              @php($i=0)
              @foreach($products as $product)

              @if($i %3 == 0 )
                <div class="row">

              @endif

                <div class="col-4">
                       <a href="/HomePage/product/ardescription"> <img src="{{'data:image/jpeg;base64,'.base64_encode( $product->image ).' '}}"></a>
                        <h5>{{$product->productTitle}}<br></h5>
                        <h6>{{$product->price}} EGP</h6>
                        <form method="post" action="/HomePage/category/{{$product->productId}}/{{$product->categoryId}}/1">
                          @csrf
                            <button type="submit" class="button">أضف إلى السلة</button>
                        </form>
                      </div>

                @php($i++)
                @if($i %3==0)

                </div>
                @endif
                @endforeach


                </div>

            </div>





        </div>
     @endsection
