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
                <p class="py-12 italic">
                    Please login to add a new car.
                </p>
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
                              {{$review->productId}}
                              {{ $review->title }}
                          </a>
                          <p>{{$review->content}}</p>
                      </h2>

                  </div>


          </div>
          @endif



        </div>
        @endforeach
        @if (Auth::user())
        <div class="flex justify-center pt-20">
            <form action="/products/review/{{$productId}}/{{$userId}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">

                  <input
                      type="text"
                      class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                      name="title"
                      placeholder="title of your reiew"
                      >

                  <input
                      type="text"
                      class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                      name="content"
                      placeholder="content of your review"
                      >

                        <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                            Submit
                        </button>
                </div>
            </form>
        </div>
        @else
        <p class="py-12 italic">
            Please login to add review.
        </p>
        @endif
    </div>

@endsection
