@extends('userInterface.arabic.arheader')
@section('content')



           <!-----cart Items-->
           <div class="container cart-page">
            <table dir="rtl">
                <tr class="ar">
                    <th>المنتج</th>
                    <th>كمية</th>
                    <th>المجموع الفرعي</th>
                </tr>
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
                    <td>{{$itemCart->cart_itemQuantity}}</td>
                    <td>{{$itemCart->totalPrice}} EGP</td>

                </tr>
                @endforeach
            </table>
           </div>
           <div class="total-price">
            <table>
                <tr>
                    <td>{{$overAllTotal->totalPrice}} EGP</td>
                    <td>المجموع</td>
                   
                </tr>
            </table>
        </div>

@endsection