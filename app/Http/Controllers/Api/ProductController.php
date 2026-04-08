<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        $cartProductIds = auth()->check()
            ? Cart::where('user_id', auth()->id())->pluck('product_id')->toArray()
            : [];

        $products->getCollection()->transform(function ($product) use ($cartProductIds) {
            $product->image = $product->image
                ? asset('uploads/products/' . $product->image)
                : asset('assets/images/placeholder.png');

            $product->is_added_in_cart = in_array($product->id, $cartProductIds);

            return $product;
        });

        return response()->json([
            'data' => $products,
            'status' => true
        ]);
    }
}
