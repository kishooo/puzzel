@extends('userInterface.arabic.arheader')
@section('content')


               <div class="small-container" dir="rtl">
                <div class="row">
                    <div class="col-2">
                        <img src="{{'data:image/jpeg;base64,'.base64_encode( $product->image ).' '}}" width="100%">
                    </div>
                    <div class="col-2">
                        <div class="descr">
                    <h4>اسم المنتج :<span>{{$product->arTitle}}</span></h4>
                    <h4>الاستخدام الموصى به : <span>{{$product->Recommended}}</span></h4>
                        <h4>كود المنتج : <span>{{$product->barCode}}</span></h4>
                    <h4>السعر: <span>{{$product->price}} EGP</span></h4>
                    <h4>تفاصيل المنتج:</h4>
                    <p>{{$product->arSummary}}.</p>
                        <form action="/ARonline/ARShowProducts/ARMainProducts/{{$product->id}}/{{$product->id}}" method="post">
                          @csrf
                        @if (Auth::user())
                            <button type="submit" class="button">أضف إلى السلة</button>
                        @else
                            <a href="/online/login" class="button">Login to add into cart</a>
                        @endif
                      </form>
                    </div>
                    </div>
                </div>
               </div>

               <h2 class="title">أضف تقييم لهذا المنتج</h2>
               <div class="card review arreview" dir="rtl">
                <form action ="/ARonline/ARShowProducts/{{$product->id}}" method="post">
                  @csrf
                    <div class="form-group">
                      <label for="formGroupExampleInput">الاسم</label>
                      <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="إدخل الاسم">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">التقييم</label>
                      <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                      <button type="submit" class="button">حفظ</button>
                  </form>
              </div>
              <h2 class="title">التقييمات</h2>
              <div class="feedback" id="review">
                <div class="small-container">
                    <div class="row">
                      @foreach($getReviews as $getReview)
                        <div class="col-3">
                            <i class="fa fa-quote-left"></i>
                            <p>{{$getReview->title}}</p>
                            <p>{{$getReview->content}}</p>
                           <h6>{{$getReview->name}}</h6>
                        </div>
                        @endforeach
                    </div>
                </div>
              </div>

            <!--------------products-->
            <div class="small-container">
                <h2 class="title">المنتجات الموصى بها</h2>
                <div class="row">
                    <div class="col-4">
                      @if(Auth::user())
                      <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue0[0]->id}}" method="post">
                        @else
                        <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue0[0]->id}}" method="post">

                        @endif
                        @csrf
                        @if(Auth::user())
                        <a href="/ARonline/ARShowProducts/{{$randValue0[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue0[0]->image ).' '}}"></a>
                        @else
                        <a href="/ARonline/ARShowProducts/{{$randValue0[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue0[0]->image ).' '}}"></a>
                        @endif
                        <h4>{{$randValue0[0]->arTitle}}<br></h4>
                        <p>{{$randValue0[0]->price}} EGP</p>
                            @if (Auth::user())
                            <button type="submit" href="" class="button">أضف إلى السلة</a>
                            @else
                            <a type="submit" href="/ARonline/login" class="button">Login to Add to cart</a>
                              @endif
                      </form>

                    </div>
                    <div class="col-4">
                      @if(Auth::user())
                      <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue1[0]->id}}" method="post">
                        @else
                        <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue1[0]->id}}" method="post">

                        @endif
                        @csrf
                        @if(Auth::user())
                        <a href="/ARonline/ARShowProducts/{{$randValue1[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue1[0]->image ).' '}}"></a>
                        @else
                        <a href="/ARonline/ARShowProducts/{{$randValue1[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue1[0]->image ).' '}}"></a>
                        @endif
                        <h4>{{$randValue1[0]->arTitle}}<br></h4>
                        <p>{{$randValue1[0]->price}} EGP</p>
                        @if (Auth::user())
                        <button type="submit" href="" class="button">أضف إلى السلة</a>
                        @else
                        <a type="submit" href="/ARonline/login" class="button">Login to Add to cart</a>
                          @endif
                    </div>
                    <div class="col-4">
                      @if(Auth::user())
                      <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue2[0]->id}}" method="post">
                        @else
                        <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue2[0]->id}}" method="post">

                        @endif
                        @csrf
                        @if(Auth::user())
                        <a href="/ARonline/ARShowProducts/{{$randValue2[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue2[0]->image ).' '}}"></a>
                        @else
                        <a href="/ARonline/ARShowProducts/{{$randValue2[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue2[0]->image ).' '}}"></a>
                        @endif
                        <h4>{{$randValue1[0]->arTitle}}<br></h4>
                        <p>50.00 EGP</p>
                        @if (Auth::user())
                        <button type="submit" href="" class="button">أضف إلى السلة</a>
                        @else
                        <a type="submit" href="/ARonline/login" class="button">Login to Add to cart</a>
                          @endif
                    </div>
                    <div class="col-4">
                      @if(Auth::user())
                      <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue2[0]->id}}" method="post">
                        @else
                        <form  action="/ARonline/ARShowProducts/{{$product->id}}/{{$randValue2[0]->id}}" method="post">

                        @endif
                        @csrf
                        @if(Auth::user())
                        <a href="/ARonline/ARShowProducts/{{$randValue2[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue3[0]->image ).' '}}"></a>
                        @else
                        <a href="/ARonline/ARShowProducts/{{$randValue2[0]->id}}"><img src="{{'data:image/jpeg;base64,'.base64_encode( $randValue3[0]->image ).' '}}"></a>
                        @endif
                        <h4>{{$randValue3[0]->arTitle}}<br></h4>
                        <p>{{$randValue3[0]->price}} EGP</p>
                        @if (Auth::user())
                        <button type="submit" href="" class="button">أضف إلى السلة</a>
                        @else
                        <a type="submit" href="/ARonline/login" class="button">Login to Add to cart</a>
                          @endif
                    </div>
                </div>


            </div>
        </div>
        @endsection
