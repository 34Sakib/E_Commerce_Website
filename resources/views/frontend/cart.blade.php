@extends('frontend.master')
@section('main')
  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
     <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
              <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            <?php $total_price=0; $total_price_cart=0;?>

           @foreach($carts as $cart)

              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                    <img height="200"  width="200" src="\photo_product\{{$cart->image}}">
                    </div>
                    <div class="media-body">
                      <p></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>{{$cart->title}}</h5>
                </td>
                <td>
                  <h5>{{$cart->price}}</h5>
                </td>
                <td>
                  <div class="product_count">
                    
                    <input class="input-number" name="Qty" type="text" value="{{$cart->Qty}}" disabled>
                  
                  </div>
                </td>
                <td>
                <?php $total_price_cart=$cart->price*$cart->Qty ?>
                  <h5>{{$total_price_cart}}</h5>
                </td>

                <td>
                
                  <h5><a class="btn btn-danger" href="{{route('delete_cart',$cart->id)}}">Delete</a></h5>
                </td>
              </tr>

              <?php $total_price=$total_price+$total_price_cart; ?>

          @endforeach
            
            <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>${{$total_price}}</h5>
                </td>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route('frontend_index')}}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="{{ route('checkout') }}">Proceed to checkout</a>
          </div>
        </div>
      </div>

  </section>
  <!--================End Cart Area =================-->
  @endsection
