@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Orders</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Orders</div>
                </li>
            </ul>
        </div>




        <div class="wg-box order-table-card">
            <div class="order-table-card__header">
                <div>
                    <h5 class="mb-2">Orders List</h5>
                    <p class="text-tiny mb-0">Professional overview of each order with product-level status summary.</p>
                </div>
            </div>

            <div class="wg-table table-all-user order-table-wrap">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered order-table">
                        <thead>
                            <tr>
                                <th style="width:90px">Order No</th>
                                <th>Customer</th>
                                <th class="text-center">Phone</th>
                                <th>Email</th>
                                <th class="text-center">Total</th>
{{--                                <th>Product Statuses</th>--}}
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Items</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
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
                                    <td>
                                        <span class="order-meta-text">{{ $order->email }}</span>
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
                                        <a href="{{ route('admin.orders.show', $order) }}" title="View order" class="order-view-link">
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
                                    <td colspan="9" class="text-center order-empty-state">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
