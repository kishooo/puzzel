@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">

              {{$users[0]->name}}

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
            <form action="/online/showcart/{{$users[0]->id}}" method="POST" enctype="multipart/form-data">
          @foreach ($cartss as $carts)

            @csrf
          <div class="w-5/6 py-10">

                  <div class="m-auto">



                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/">
                              {{$carts->title}}
                              {{$carts->quantity}}
                              {{$carts->totalPrice}}
                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/cars/{{ $carts->title}}">
                            price {{$carts->price}}

                          </a>
                        </h2>
                      <h2>total price for this product {{$carts->totalPrice}}</h2>
                      <hr class="mt-4 mb-8">
                  </div>


          </div>

        <div>
          @endforeach
          @foreach ($totalPrices as $totalPrice)

            @csrf
          <h2>overAll price {{$totalPrice->totalPrice}}</h2>

          </a>
          @endforeach
          <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
              Submit
          </button>
          </div>
          </form>
        </div>


@endsection
