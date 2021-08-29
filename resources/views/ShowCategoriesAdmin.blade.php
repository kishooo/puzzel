@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


            </h1>

        </div>

        <div class="flex justify-center pt-20">
          @foreach ($categories as $category)

            @csrf
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> {{$category->id}}</h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $category->title }}
                          </a>
                      </h2>

                  </div>


          </div>



        </div>
        @endforeach
        <p class="py-12 italic">
            Please login to add review.
        </p>
    </div>

@endsection
