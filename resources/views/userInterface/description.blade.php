@extends('userInterface.header')
@section('content')


               <div class="small-container">

                <div class="row">
                    <div class="col-2">
                        <img src="{{ asset('images/'. $product->image) }}" width="100%">
                    </div>
                    <div class="col-2">
                        <div class="descr">
                    <h4>Product name :<span>{{$product->title}}</span></h4>
                    <h4>Recommended Use : <span>Household disinfecting – sanitizing and laundry bleach</span></h4>
                        <h4>Product Code : <span>{{$product->id}}</span></h4>
                    @if($product->newPrice!=0)
                    <h4>Price: <span>{{$product->newPrice}}</span></h4>
                    @else
                    <h4>Price: <span>{{$product->price}}</span></h4>
                    @endif
                    <h4>Product Details:</h4>
                    <p>{{$product->summary}}.</p>
                        <a href="" class="button">Add to cart</a>
                    </div>
                    </div>
                </div>
               </div>



            <!--------------products-->
            <div class="small-container">
                <h2 class="title">Recommended Products</h2>
                <div class="row">
                    <div class="col-4">
                      <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue0[0]->id}}/1" method="post">
                        @csrf
                        <img src="{{ asset('images/'. $randValue0[0]->image) }}">
                        <h4>{{$randValue0[0]->title}}<br></h4>
                        <p>{{$randValue0[0]->price}}</p>
                            <button type="submit" href="" class="button">Add to cart</a>
                      </form>
                    </div>
                    <div class="col-4">
                      <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue1[0]->id}}/1" method="post">
                        @csrf
                        <img src="{{ asset('images/'. $randValue1[0]->image) }}">
                        <h4>{{$randValue1[0]->title}}<br></h4>
                        <p>{{$randValue1[0]->price}}</p>
                        <button type="submit" href="" class="button">Add to cart</a>
                      </form>
                    </div>
                    <div class="col-4">
                      <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue2[0]->id}}/1" method="post">
                        @csrf
                        <img src="{{ asset('images/'. $randValue2[0]->image) }}">
                        <h4>{{$randValue2[0]->title}}<br></h4>
                        <p>{{$randValue2[0]->price}}</p>
                        <button type="submit" href="" class="button">Add to cart</a>
                        </form>
                    </div>

                      <div class="col-4">
                        <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue3[0]->id}}/1" method="post">
                          @csrf
                          <img src="{{ asset('images/'. $randValue3[0]->image) }}">
                          <h4>{{$randValue3[0]->title}}<br></h4>
                          <p>{{$randValue3[0]->price}}</p>
                          <button type="submit" href="" class="button">Add to cart</a>
                        </form>
                      </div>


                </div>


            </div>
        </div>
        @endsection
