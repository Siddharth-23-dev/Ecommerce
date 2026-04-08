<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $carts = Cart::query()
            ->with(['user', 'product'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->whereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })->orWhereHas('product', function ($productQuery) use ($search) {
                        $productQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('sku', 'like', "%{$search}%");
                    })->orWhere('id', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $summary = [
            'lines' => (clone $carts)->total(),
            'quantity' => (clone $carts->getCollection())->sum('quantity'),
            'value' => $carts->getCollection()->sum(function (Cart $cart) {
                return ((float) ($cart->product?->price ?? 0)) * (int) $cart->quantity;
            }),
        ];

        return view('admin.cart.index', compact('carts', 'search', 'summary'));
    }
}
