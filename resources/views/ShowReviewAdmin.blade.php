@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


            </h1>

        </div>

        <div class="flex justify-center pt-20">
          @foreach ($reviews as $review)

            @csrf
            <form action="/admin/ShowReviewAdmin/{{$review->id}}/{{$userId}}" method="POST" enctype="multipart/form-data">
                @csrf
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> {{$review->id}}</h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $review->name }}{{ $review->title }}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $review->content }}
                          </a>
                      </h2>
                      @if($review->published % 2 ==0)
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              published
                          </a>
                      </h2>
                      @else
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              Hidden
                          </a>
                      </h2>
                      @endif

                  </div>

                  @if($review->published % 2 ==0)
                  <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                      hide review
                  </button>
                  @else
                  <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                      publish review
                  </button>
                  @endif



          </div>
          </form>



        </div>
        @endforeach
        <p class="py-12 italic">
            Please login to add review.
        </p>
    </div>

@endsection
