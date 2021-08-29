@extends('userInterface.header')
@section('content')



           <!-----cart Items-->
           <div class="container cart-page">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                @foreach($itemCarts as $itemCart)
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="{{ asset('images/'. $itemCart->image) }}">
                            <div>
                                <p>{{$itemCart->title}}</p>
                                <small>Price per unit {{$itemCart->finalProductPrice}} EGP</small>
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
                    <td>Total</td>
                    <td>{{$overAllTotal->totalPrice}} EGP</td>
                </tr>
            </table>
        </div>

@endsection
