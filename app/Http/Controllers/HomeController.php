<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function Premium(){
        $user_type = Auth::User()->user_type;
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();
        $users = User::all();

        if($user_type == 1){
            return view('backend.index',compact('categories','products','orders','users'));
        } elseif($user_type == 0){
            return view('dashboard',compact('products'));
        }
    }
}
