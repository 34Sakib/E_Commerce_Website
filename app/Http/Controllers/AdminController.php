<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function read_order(){

        $orders = Order::all();

        return view('admin.read_order',compact('orders'));
    }

    public function read_user(){

        $users = User::all();

        return view('admin.read_user',compact('users'));
    }

    public function delete_user($id){

        $user = User::find($id);

        $user->delete();

        return redirect()->back();

    }

    public function order_detail($id){

        $user = User::find($id);

      return view('admin.order_detail',compact('user'));


    }

    public function order_delivery($id){

        $order = Order::find($id);

        $order->status='Delivery';
        $order->save();

        return redirect()->back();


    }

    public function order_pending($id){

        $order = Order::find($id);

        $order->status='Pending';
        $order->save();

        return redirect()->back();


    }

    
}
