@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


            </h1>

        </div>

        @if (Auth::user())
            <div class="pt-10">
                <a
                    href="cars/create"
                    class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new car &rarr;
                </a>
            </div>
            @else
                <a class="py-12 italic"
                    herf="/login">
                    Please login to write review.
                </a>
        @endif
        <div class="flex justify-center pt-20">
          @foreach ($reviews as $review)

            @csrf
            @if($review->productId == $productId)
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> {{$review->name}}</h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">
                              
                              {{ $review->title }}
                          </a>
                          <p>{{$review->content}}</p>
                      </h2>

                  </div>


          </div>
          @endif



        </div>
        @endforeach
        <p class="py-12 italic">
            Please login to add review.
        </p>
    </div>

@endsection
