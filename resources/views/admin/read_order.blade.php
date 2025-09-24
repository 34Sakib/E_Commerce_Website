@extends('backend.master')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Read Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Read Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Detail</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->product_id}}</td>
                    <td><img height="100" width="100" src="\photo_product\{{$order->image}}"></td>
                    <td>{{$order->Qty}}</td>
                    <td>{{$order->price}}</td>
                    <td>
                        @if($order->status=='Pending')

                           <a class="btn btn-warning" href="{{route('order_delivery',$order->id)}}">{{$order->status}}</a>
                        @elseif($order->status=='Delivery')
                            <a class="btn btn-success" href="{{route('order_pending',$order->id)}}">{{$order->status}}</a>
                        
                        @endif
                
                
                    </td>

                    <td><a class="btn btn-info" href="{{route('order_detail',$order->user_id)}}">User</a></td>
                     <td><a class="btn btn-danger" href="{{route('delete_order',$order->id)}}">Delete</a></td>
                  </tr>
                  @endforeach
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Detail</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


