<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $metrics = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::whereHas('items', function ($query) {
                $query->where('status', OrderItem::STATUS_PENDING);
            })->count(),
            'cancelled_orders' => Order::whereHas('items', function ($query) {
                $query->where('status', OrderItem::STATUS_CANCELLED);
            })->count(),
            'total_earnings' => (float) Order::sum('total_amount'),
            'total_categories' => Category::count(),
            'total_brands' => Brand::count(),
            'total_products' => Product::count(),
            'out_of_stock_products' => $this->getOutOfStockProductCount(),
        ];

        $recentOrders = Order::query()
            ->with(['user', 'items'])
            ->withCount('items')
            ->latest()
            ->take(8)
            ->get();

        return view('admin.index', compact('metrics', 'recentOrders'));
    }

    private function getOutOfStockProductCount(): int
    {
        foreach (['stock', 'quantity', 'stock_quantity', 'inventory_count'] as $column) {
            if (Schema::hasColumn('products', $column)) {
                return Product::where($column, '<=', 0)->count();
            }
        }

        return 0;
    }
}
