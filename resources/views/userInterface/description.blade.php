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
                    @if (Auth::user())
                        <button type="submit" class="button">Add to cart</button>
                    @else
                        <a href="/online/login" class="button">Login to add into cart</a>
                    @endif
                    </div>
                    </div>
                </div>
               </div>


    <!-------Review---->
 <h2 class="title">Add Review for this Product</h2>
               <div class="card review">
                <form>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Name</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Review</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                      <button type="submit" class="button">Save</button>
                  </form>
              </div>
<<<<<<< HEAD

=======
              
               <h2 class="title">Reviews</h2>
              <div class="feedback">
                <div class="small-container">
                    <div class="row">
                  
                        <div class="col-3">
                            <i class="fa fa-quote-left"></i>
                            <p>good product</p>
                           <h4>lamasa</h4>
                           <h6>By ahmed</h6>
                        </div>
    
                    </div>
                </div>
              </div>
                
>>>>>>> 837dfc475ee081acc1b6652eb5b52290e9ed97ba
            <!--------------products-->
            <div class="small-container" id="Recommended">
                <h2 class="title">Recommended Products</h2>
                <div class="row">
                    <div class="col-4" >
                      @if(Auth::user())
                      <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue0[0]->id}}/{{Auth::user()->id}}" method="post">
                        @endif
                        @csrf
                        <img src="{{ asset('images/'. $randValue0[0]->image) }}">
                        <h4>{{$randValue0[0]->title}}<br></h4>
                        <p>{{$randValue0[0]->price}}</p>
                            @if (Auth::user())
                            <button type="submit" href="" class="button">Add to cart</a>
                            @else
                            <a type="submit" href="/online/login" class="button">Login to Add to cart</a>
                              @endif
                      </form>
                    </div>
                    <div class="col-4">
                      @if (Auth::user())
                        <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue1[0]->id}}/{{Auth::user()->id}}" method="post">
                          @csrf
                      @else
                        <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue1[0]->id}}/visitor" method="post">
                          @endif
                          @csrf
                          <img src="{{ asset('images/'. $randValue1[0]->image) }}">
                          <h4>{{$randValue1[0]->title}}<br></h4>
                          <p>{{$randValue1[0]->price}}</p>
                          @if (Auth::user())
                          <button type="submit" href="" class="button">Add to cart</a>
                          @else
                          <a type="submit" href="/online/login" class="button">Login to Add to cart</a>
                            @endif
                        </form>

                    </div>
                    <div class="col-4">
                      <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue2[0]->id}}/1" method="post">
                        @csrf
                        <img src="{{ asset('images/'. $randValue2[0]->image) }}">
                        <h4>{{$randValue2[0]->title}}<br></h4>
                        <p>{{$randValue2[0]->price}}</p>
                        @if (Auth::user())
                        <button type="submit" href="" class="button">Add to cart</a>
                        @else
                        <a type="submit" href="/online/login" class="button">Login to Add to cart</a>
                          @endif
                        </form>
                    </div>

                      <div class="col-4">
                        <form  action="/online/ShowProducts/{{$product->id}}/{{$randValue3[0]->id}}/1" method="post">
                          @csrf
                          <img src="{{ asset('images/'. $randValue3[0]->image) }}">
                          <h4>{{$randValue3[0]->title}}<br></h4>
                          <p>{{$randValue3[0]->price}}</p>
                          @if (Auth::user())
                          <button type="submit" href="" class="button">Add to cart</a>
                          @else
                          <a type="submit" href="/online/login" class="button">Login to Add to cart</a>
                            @endif
                        </form>
                      </div>


                </div>


            </div>
        </div>
        @endsection
