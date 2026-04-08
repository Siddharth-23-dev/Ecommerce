<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $status = trim((string) $request->query('status', ''));

        $orders = Order::query()
            ->with(['user', 'items'])
            ->withCount('items')
            ->when(in_array($status, OrderItem::STATUSES, true), function ($query) use ($status) {
                $query->whereHas('items', function ($itemQuery) use ($status) {
                    $itemQuery->where('status', $status);
                });
            })
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('id', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('first_name', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%')
                        ->orWhereHas('items.product', function ($productQuery) use ($search) {
                            $productQuery->where('name', 'like', '%' . $search . '%')
                                ->orWhere('sku', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('items', function ($itemQuery) use ($search) {
                            $itemQuery->where('status', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', '%' . $search . '%')
                                ->orWhere('email', 'like', '%' . $search . '%');
                        });
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $availableStatuses = OrderItem::STATUSES;

        return view('admin.order.index', compact('orders', 'search', 'status', 'availableStatuses'));
    }

    public function show(Order $order)
    {
        $order->load([
            'user',
            'items.product.category',
            'items.product.brand',
        ]);

        $subtotal = $order->items->sum(function ($item) {
            return (float) $item->price * (int) $item->quantity;
        });

        $shippingAddress = collect([
            trim($order->first_name . ' ' . $order->last_name),
            $order->address,
            trim(implode(', ', array_filter([$order->city, $order->state]))),
            $order->zip_code,
        ])->filter();

        $availableStatuses = OrderItem::STATUSES;

        return view('admin.order.details', compact('order', 'subtotal', 'shippingAddress', 'availableStatuses'));
    }

    public function updateItemStatus(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(OrderItem::STATUSES)],
        ]);

        $status = $validated['status'];
        $orderItem->fill($this->statusPayload($orderItem, $status));
        $orderItem->save();

        return back()->with('success', 'Product status updated successfully.');
    }

    private function statusPayload(OrderItem $orderItem, string $status): array
    {
        $payload = [
            'status' => $status,
            'confirmed_at' => null,
            'delivered_at' => null,
            'cancelled_at' => null,
        ];

        if ($status === OrderItem::STATUS_CONFIRMED) {
            $payload['confirmed_at'] = $orderItem->confirmed_at ?? now();
        }

        if ($status === OrderItem::STATUS_DELIVERED) {
            $payload['confirmed_at'] = $orderItem->confirmed_at ?? now();
            $payload['delivered_at'] = $orderItem->delivered_at ?? now();
        }

        if ($status === OrderItem::STATUS_CANCELLED) {
            $payload['confirmed_at'] = $orderItem->confirmed_at;
            $payload['cancelled_at'] = $orderItem->cancelled_at ?? now();
        }

        return $payload;
    }
}
