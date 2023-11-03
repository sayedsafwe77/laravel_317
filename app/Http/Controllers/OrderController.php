<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    //
    function index()
    {
        // if (Auth::user()->type == 'admin') {
        // } else {
        //     $orders = Order::where('user_id', Auth::id())->get();
        // }
        $orders = Order::get();
        return view('order.index', ['orders' => $orders]);
    }
    function store(Request $request)
    {
        // step 1 validate quantity
        $product = Product::select('id', 'quantity', 'price')->where('id', $request->product_id)->first();
        // if (!$this->isProductQuantityAvailable($product, $request->quantity)) return redirect()->back();
        // step 2 calculate total price
        $total = $this->calculateOrderPrice($request->all(), $product);
        // step 3 subtract order quantity from product
        // 1000  step1  step2 step3
        DB::beginTransaction();
        try {
            $product->quantity -= $request->quantity;
            $product->save();
            // step 4 create order
            $request['total'] = $total;
            $order =  Order::create($request->except('_token'));
            // step 5 add product to order_products table
            $order->products()->attach(['product_id' => $product->id], ['quantity' => $request->quantity]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->route('order.index');
    }
    function isProductQuantityAvailable($product, $quantity)
    {
        return $product->quantity >= $quantity;
    }
    function calculateOrderPrice($data, $product)
    {
        return $data['quantity'] * $product->price;
    }
    function create()
    {
        // Gate::authorize();
        if (!Gate::authorize('create-order')) {
            $id = Auth::id();
            logger("user {$id} trying to access page create order");
            abort(403);
        }


        $users = User::select('id', 'name')->get();
        $products = Product::select('id', 'name', 'price', 'quantity')->get();
        return view('order.create', ['users' => $users, 'products' => $products]);
    }
}
