@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <div>
                <h3>Dashboard</h3>
                <p class="text-tiny mb-0">Live store overview with order, catalog, and earnings metrics.</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="tf-button style-1" style="width:auto; min-width:170px;">Manage Orders</a>
        </div>

        <div class="order-stats-grid mb-30">
            <div class="order-stat-card">
                <span>Total Orders</span>
                <strong>{{ number_format($metrics['total_orders']) }}</strong>
            </div>
            <div class="order-stat-card order-stat-card--pending">
                <span>Pending Orders</span>
                <strong>{{ number_format($metrics['pending_orders']) }}</strong>
            </div>
            <div class="order-stat-card order-stat-card--cancelled">
                <span>Cancelled Orders</span>
                <strong>{{ number_format($metrics['cancelled_orders']) }}</strong>
            </div>
            <div class="order-stat-card order-stat-card--delivered">
                <span>Total Earnings</span>
                <strong>Rs. {{ number_format($metrics['total_earnings'], 2) }}</strong>
            </div>
        </div>

        <div class="order-stats-grid mb-30">
            <div class="order-stat-card">
                <span>Total Categories</span>
                <strong>{{ number_format($metrics['total_categories']) }}</strong>
            </div>
            <div class="order-stat-card">
                <span>Total Brands</span>
                <strong>{{ number_format($metrics['total_brands']) }}</strong>
            </div>
            <div class="order-stat-card">
                <span>Total Products</span>
                <strong>{{ number_format($metrics['total_products']) }}</strong>
            </div>
            <div class="order-stat-card order-stat-card--cancelled">
                <span>Out Of Stock</span>
                <strong>{{ number_format($metrics['out_of_stock_products']) }}</strong>
            </div>
        </div>

        <div class="wg-box order-table-card">
            <div class="order-table-card__header">
                <div>
                    <h5 class="mb-2">Recent Orders</h5>
                    <p class="text-tiny mb-0">Latest orders across the store with product-level status summary.</p>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="order-view-link">View All</a>
            </div>

            <div class="wg-table table-all-user order-table-wrap">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered order-table">
                        <thead>
                            <tr>
                                <th style="width:90px">Order No</th>
                                <th>Customer</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Total</th>
{{--                                <th>Statuses</th>--}}
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Items</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $order)
                                <tr>
                                    <td class="text-center">
                                        <div class="order-id-badge">#{{ $order->id }}</div>
                                    </td>
                                    <td>
                                        <div class="order-customer">
                                            <strong>{{ trim($order->first_name . ' ' . $order->last_name) }}</strong>
                                            <div class="text-tiny">{{ $order->user?->name ?? 'Guest Checkout' }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="order-meta-text">{{ $order->phone }}</span>
                                    </td>
                                    <td class="text-center">
                                        <strong class="order-total">Rs. {{ number_format((float) $order->total_amount, 2) }}</strong>
                                    </td>
{{--                                    <td>--}}
{{--                                        <div class="order-status-stack">--}}
{{--                                            @foreach($order->items->groupBy('status') as $itemStatus => $groupedItems)--}}
{{--                                                <span class="order-status-pill order-status-pill--{{ $itemStatus }}">--}}
{{--                                                    {{ ucfirst($itemStatus) }}--}}
{{--                                                    <strong>{{ $groupedItems->count() }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                    <td class="text-center">
                                        <div class="order-date-block">
                                            <strong>{{ $order->created_at?->format('d M Y') ?? 'N/A' }}</strong>
                                            <span>{{ $order->created_at?->format('h:i A') ?? '' }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="order-items-count">{{ $order->items_count }}</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="order-view-link">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </div>
                                            <span>View</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center order-empty-state">No recent orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
