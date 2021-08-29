@extends('layout.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create product with new category or existing one
            </h1>
            <h1 class="text-5xl uppercase bold">
                Hello User {{$user}}
            </h1>
        </div>
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
    <div class="flex justify-center pt-20">
        <form action="/admin/create/{{$user}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block">
                <input
                    type="file"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="image"
                    placeholder="Upload image...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="name"
                    placeholder="Brand name...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="quantity"
                    placeholder="quantity of the products ...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="category"
                    placeholder="category...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="price"
                    placeholder="price...">
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="newPrice"
                    placeholder="newPrice...">

                    <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </form>
    </div>
@endsection
