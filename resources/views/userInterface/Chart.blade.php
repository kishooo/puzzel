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
                            <img src="{{ asset('images/'. $itemCart->image) }}">
                            <div>
                                <p>{{$itemCart->title}}</p>
                                <small>Price per unit {{$itemCart->finalProductPrice}} EGP</small>
                            </div>
                        </div>
                    </td>
                    <td><input class="qn" name="quantities[{{$i}}]" type="number" value="{{$itemCart->cart_itemQuantity}}" min="0"></td>
                    <td><button type="submit" name="cancel" onclick="javascript: form.action='/HomePage/category/ShowCart/{{$itemCart->cart_itemId}}/1'; form.method='post';" class="button bd">Delete</button></td>

                      @php($i++)
                </tr>
                @endforeach

                <tr>
                  <td><button type="submit" onclick="javascript: form.action='/HomePage/category/ShowCart/{{Auth::user()->id}}'; form.method='post';" class="button">confirm</button></td>
                </tr>
            </table>

          </form>
           </div>




           @endsection
