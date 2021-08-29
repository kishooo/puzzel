@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


            </h1>

        </div>

        <div class="flex justify-center pt-20">
          @foreach ($orders as $order)

            @csrf
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> {{$order->name}}</h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $order->promo }}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $order->email }}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $order->city }}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $order->total }}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              {{ $order->type }}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                        @if($order->paid == 0)
                          <a href="/">
                            not paid
                          </a>
                          @else
                          <a href="/">
                            paid
                          </a>
                          @endif
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
