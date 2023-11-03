<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::get();
        return response()->json(['data' => $orders]);
    }
}
