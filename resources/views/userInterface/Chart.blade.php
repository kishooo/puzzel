@extends('userInterface.header')
@section('content')

           <!-----cart Items-->
           <div class="container cart-page" id="table">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                <form name="form" enctype="multipart/form-data">
                  @csrf
                @php($i=0)
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
                    <td><input class="qn" name="quantities[{{$i}}]" type="number" value="{{$itemCart->cart_itemQuantity}}" min="1"></td>
                    <td><button type="submit" name="cancel" onclick="javascript: form.action='/HomePage/category/ShowCart/{{$itemCart->cart_itemId}}'; form.method='post';" class="button bd">Delete</button></td>

                      @php($i++)
                </tr>
                @endforeach

                <tr>
                  <td><button type="submit" onclick="javascript: form.action='/HomePage/submit/category/ShowCart'; form.method='post';" class="button">confirm</button></td>
                </tr>
            </table>

          </form>
           </div>




           @endsection
