<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $cartItem = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $cartItem,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $cartItem = Cart::create([
            'user_id'    => auth()->id(),
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully',
            'data'    => $cartItem->load('product'),
        ]);
    }

    public function update(Request $request, Cart $cart)
    {
        $this->ensureOwnership($cart);

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Cart item updated successfully',
            'data' => $cart->load('product'),
        ]);
    }

    public function destroy(Cart $cart)
    {
        $this->ensureOwnership($cart);

        $cart->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Cart item removed successfully',
        ]);
    }

    public function clear()
    {
        Cart::where('user_id', auth()->id())->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Cart cleared successfully',
        ]);
    }

    private function ensureOwnership(Cart $cart): void
    {
        abort_if($cart->user_id !== auth()->id(), 403, 'You are not allowed to access this cart item.');
    }

}
