@extends('layout.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                edit product
            </h1>
            <h1 class="text-5xl uppercase bold">
                Hello User {{$user->name}}
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/admin/online/products/edit/{{$product->id}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (Auth::user())
            <div class="block">
                <input
                    type="file"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="image"
                    placeholder="Upload image..."
                    value="{{ $product->image }}">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="name"
                    placeholder="Brand name..."
                    value="{{ $product->title }}">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="price"
                    placeholder="price..."
                    value="{{ $product->price }}">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="quantity"
                    placeholder="quantity..."
                    value="{{ $product->quantity }}">
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="appeared"
                    placeholder="appearing this product..."
                    value="{{ $product->appeared }}">
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="newPrice"
                    placeholder="newPrice..."
                    value="{{ $product->newPrice }}">

                    <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
                  @endif
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
