<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        $products->getCollection()->transform(function ($product) {
            $product->image = $product->image
                ? asset('uploads/products/' . $product->image)
                : asset('assets/images/placeholder.png');

            return $product;
        });

        return response()->json([
            'data' => $products,
            'status' => true
        ]);
    }
}
