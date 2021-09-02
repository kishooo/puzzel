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
                            <img src="{{'data:image/jpeg;base64,'.base64_encode( $itemCart->image ).' '}}">
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
              <form name="form">
                @csrf
                <tr>
                    <td>Total</td>
                    <td>{{$overAllTotal->totalPrice}} EGP</td>
                </tr>
                <tr>
                <td><button type="submit" onclick="javascript: form.action='/HomePage/confirm/category/ConfirmCart'; form.method='post';" class="button">confirm</button></td>
              </tr>
                </form>
            </table>

        </div>

@endsection
