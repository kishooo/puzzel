@extends('userInterface.arabic.arheader')
@section('content')

           <!-----cart Items-->
           <div class="container cart-page" >
            <table dir="rtl">
                <tr class="ar">
                    <th>المنتج</th>
                    <th>كمية</th>
                    <th>إلغاء</th>
                </tr>
                <form action="/HomePage/category/arShowCart/1" method="POST" enctype="multipart/form-data">
                  @csrf
                @php($i=0)
                @foreach($itemCarts as $itemCart)

                <tr>
                  <td>
                        <div class="cart-info">
                            <img src="{{ asset('images/'. $itemCart->image) }}">
                            <div>
                                <p>{{$itemCart->title}}</p>
                                <small>السعر لكل وحدة {{$itemCart->price}} EGP</small>
                            </div>
                        </div>
                    </td>
                    <td><input class="qn" name="quantities[{{$i}}]" type="number" value="{{$itemCart->cart_itemQuantity}}" min="0"></td>
                    <td><input type="submit" name="cancel" class="button bd" value="إلغاء"></td>
                      @php($i++)
                </tr>
                @endforeach

                <tr>
                  <td><button type="submit" class="button">تأكيد</button></td>
                </tr>
            </table>

          </form>
           </div>




           @endsection
