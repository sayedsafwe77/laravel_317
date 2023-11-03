<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::paginate();
        return response()->json(['data' => ProductResource::collection($products)]);
    }
    function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json(new ProductResource($product));
    }
    function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => "product {$id} delete successfully"]);
    }
}
