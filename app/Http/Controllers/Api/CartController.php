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
            'count' => $cartItem->count()
        ]);
    }

    public function count()
    {
        $count = Cart::where('user_id', auth()->id())->count();
        return response()->json([
            'status' => 'success',
            'count' => $count
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

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
            $message = 'Product quantity updated in cart successfully';
        } else {
            $cartItem = Cart::create([
                'user_id'    => auth()->id(),
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity,
            ]);
            $message = 'Product added to cart successfully';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data'    => $cartItem->load('product'),
            'count'   => Cart::where('user_id', auth()->id())->count()
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
