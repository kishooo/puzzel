@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

        </div>

        @foreach($productCategories as $productCategory)
        <h2>{{$productCategory->title}}</h2>
        <div class="flex justify-center pt-20">
          @foreach ($productWithCategories as $productWithCategory)
          @if($productWithCategory->categoriesId==$productCategory->categoriesId && $productWithCategory->appeared==1)
            @csrf
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <a
                        class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="/products/review/{{$productWithCategory->productId}}">
                        Show Review &rarr;
                    </a>
                    <p>{{$productWithCategory->productTitle}}</p>

                    <img
                        src="{{ asset('images/'. $productWithCategory->image) }}"
                        class="w-40 mb-8 shadow-xl"
                    />
                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/cars/{{ $productWithCategory->id }}">
                              {{$productWithCategory->productTitle}} {{$productWithCategory->price}}
                          </a>
                          <img src="{{asset($productWithCategory->image)}}"/>
                      </h2>
                      @if(!empty($productWithCategory->newPrice))
                      <p> new price {{$productWithCategory->newPrice}}</p>
                      @endif
                  </div>


          </div>
        </form>

        @endif

        </div>
        @endforeach
        @endforeach
        <p class="py-12 italic">
            Please login to show your cart.
        </p>
    </div>

@endsection
