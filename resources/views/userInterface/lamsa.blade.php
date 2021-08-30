@extends('userInterface.header')
@section('content')
            <img src="{{asset('/images/Banner-Clorina.jpg')}}" class="pic">

            <!--------------products-->
            <div class="small-container">

              @php($i=0)
              @foreach($products as $product)

              @if($i %3 == 0 )
                <div class="row">

              @endif

                <div class="col-4" id="{{$i}}">
                        @if(Auth::user())
                       <a href="/online/ShowProducts/{{$product->productId}}/{{Auth::user()->id}}"> <img src="{{'data:image/jpeg;base64,'.base64_encode( $product->image ).' '}}"></a>
                       @else
                       <a href="/online/ShowProducts/{{$product->productId}}/visitor"> <img src="{{'data:image/jpeg;base64,'.base64_encode( $product->image ).' '}}"></a>
                       @endif
                        <h5>{{$product->productTitle}}<br></h5>
                        <h6>{{$product->price}} EGP</h6>
                        <form method="post" action="/HomePage/category/{{$i}}/{{$product->productId}}/{{$product->categoryId}}/1">
                          @csrf
                            @if (Auth::user())
                            <button type="submit" class="button">Add to cart</button>
                            @else
                            <a herf="/online/login" class="button">login to Add to cart</a>
                            @endif
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
