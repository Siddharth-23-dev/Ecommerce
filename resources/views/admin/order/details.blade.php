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
            <h3>Order Details #{{ $order->id }}</h3>
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
                    <a href="{{ route('admin.orders.index') }}">
                        <div class="text-tiny">Orders</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Details</div>
                </li>
            </ul>
        </div>

        <div class="order-detail-hero">
            <div class="order-detail-hero__main">
                <div class="order-id-badge">Order #{{ $order->id }}</div>
                <h4>{{ trim($order->first_name . ' ' . $order->last_name) }}</h4>
                <p class="text-tiny mb-0">{{ $order->email }} | {{ $order->phone }}</p>
            </div>
            <div class="order-detail-hero__side">
                <div class="order-summary-chip">
                    <span>{{ $order->items->sum('quantity') }}</span>
                    <small>Total Qty</small>
                </div>
                <a class="tf-button style-1 order-back-button" href="{{ route('admin.orders.index') }}">Back to Orders</a>
            </div>
        </div>

        <div class="order-stats-grid">
            @foreach($availableStatuses as $availableStatus)
                <div class="order-stat-card order-stat-card--{{ $availableStatus }}">
                    <span>{{ ucfirst($availableStatus) }}</span>
                    <strong>{{ $order->items->where('status', $availableStatus)->count() }}</strong>
                </div>
            @endforeach
        </div>

        <div class="wg-box order-table-card">
            <div class="order-table-card__header">
                <div>
                    <h5 class="mb-2">Ordered Products</h5>
                    <p class="text-tiny mb-0">Update each product separately and keep delivery history accurate.</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered order-table order-table--details">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Status Date</th>
                            <th class="text-center">SKU</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Line Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->items as $item)
                            @php
                                $product = $item->product;
                                $image = $product?->image;
                                $imageSrc = $image
                                    ? (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')
                                        ? $image
                                        : asset('uploads/products/' . $image))
                                    : asset('assets/images/placeholder.png');
                                $statusDate = match ($item->status) {
                                    'confirmed' => $item->confirmed_at,
                                    'delivered' => $item->delivered_at,
                                    'cancelled' => $item->cancelled_at,
                                    default => null,
                                };
                            @endphp
                            <tr>
                                <td class="pname">
                                    <div class="image">
                                        <img src="{{ $imageSrc }}" alt="{{ $product?->name ?? 'Product' }}" class="image">
                                    </div>
                                    <div class="name">
                                        @if($product)
                                            <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="body-title-2">
                                                {{ $product->name }}
                                            </a>
                                            <div class="text-tiny">SKU: {{ $product->sku ?? 'N/A' }}</div>
                                        @else
                                            <span class="body-title-2">Product unavailable</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">Rs. {{ number_format((float) $item->price, 2) }}</td>
                                <td class="text-center"><div class="order-items-count">{{ $item->quantity }}</div></td>
                                <td class="text-center">
                                    <span class="order-status-pill order-status-pill--{{ $item->status }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="order-date-block">
                                        <strong>{{ $statusDate?->format('d M Y') ?? '-' }}</strong>
                                        <span>{{ $statusDate?->format('h:i A') ?? '' }}</span>
                                    </div>
                                </td>
                                <td class="text-center">{{ $product?->sku ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product?->category?->name ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product?->brand?->name ?? 'N/A' }}</td>
                                <td class="text-center"><strong class="order-total">Rs. {{ number_format((float) $item->price * (int) $item->quantity, 2) }}</strong></td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('admin.order-items.update-status', $item) }}" class="order-item-action-form">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-control">
                                            @foreach($availableStatuses as $availableStatus)
                                                <option value="{{ $availableStatus }}" @selected($item->status === $availableStatus)>
                                                    {{ ucfirst($availableStatus) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="tf-button style-1">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center order-empty-state">No order items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="order-detail-grid">
            <div class="wg-box order-info-card">
                <h5>Shipping Address</h5>
                <div class="my-account__address-item">
                    <div class="my-account__address-item__detail order-address-block">
                        @foreach($shippingAddress as $line)
                            <p>{{ $line }}</p>
                        @endforeach
                        <p><strong>Mobile:</strong> {{ $order->phone }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        @if($order->order_notes)
                            <div class="order-notes-box">
                                <strong>Notes</strong>
                                <p>{{ $order->order_notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="wg-box order-info-card">
                <h5>Transaction Summary</h5>
                <table class="table table-striped table-bordered table-transaction order-summary-table">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>Rs. {{ number_format($subtotal, 2) }}</td>
                            <th>Tax</th>
                            <td>Included</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>Rs. {{ number_format((float) $order->total_amount, 2) }}</td>
                            <th>Payment Mode</th>
                            <td>COD</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at?->format('d M Y, h:i A') ?? 'N/A' }}</td>
                            <th>Updated Date</th>
                            <td>{{ $order->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Pending Items</th>
                            <td>{{ $order->items->where('status', 'pending')->count() }}</td>
                            <th>Confirmed Items</th>
                            <td>{{ $order->items->where('status', 'confirmed')->count() }}</td>
                        </tr>
                        <tr>
                            <th>Delivered Items</th>
                            <td>{{ $order->items->where('status', 'delivered')->count() }}</td>
                            <th>Cancelled Items</th>
                            <td>{{ $order->items->where('status', 'cancelled')->count() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
