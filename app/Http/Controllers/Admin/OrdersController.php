<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin/orders',compact('orders'));
    }

    
}
