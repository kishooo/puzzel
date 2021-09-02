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
                <form action="/ARHomePage/ARcategory/ARShowCart" method="POST" enctype="multipart/form-data">
                  @csrf
                @php($i=0)
                @foreach($itemCarts as $itemCart)

                <tr>
                  <td>
                        <div class="cart-info">
                            <img src="{{'data:image/jpeg;base64,'.base64_encode( $itemCart->image ).' '}}">
                            <div>
                                <p>{{$itemCart->arTitle}}</p>
                                <small>السعر لكل وحدة {{$itemCart->price}} EGP</small>
                            </div>
                        </div>
                    </td>
                    <td><input class="qn" name="quantities[{{$i}}]" type="number" value="{{$itemCart->cart_itemQuantity}}" min="1"></td>

                    <td><button type="submit" name="cancel" onclick="javascript: form.action='/ARHomePage/ARcategory/ARShowCart/{{$itemCart->cart_itemId}}'; form.method='post';" class="button bd">إلغاء</button></td>
                      @php($i++)
                </tr>
                @endforeach

                <tr>
                      <td><button type="submit" onclick="javascript: form.action='/ARHomePage/ARsubmit/ARcategory/ARShowCart'; form.method='post';" class="button">تأكيد</button></td>
                </tr>
            </table>   

          </form>
           </div>




           @endsection
