@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Carts</h3>
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
                    <div class="text-tiny">Carts</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex gap20 flex-wrap mb-4">
                <div class="wg-chart-default" style="min-width: 180px; padding: 20px;">
                    <div class="body-text">Cart Lines</div>
                    <h4>{{ $summary['lines'] }}</h4>
                </div>
                <div class="wg-chart-default" style="min-width: 180px; padding: 20px;">
                    <div class="body-text">Total Quantity</div>
                    <h4>{{ $summary['quantity'] }}</h4>
                </div>
                <div class="wg-chart-default" style="min-width: 220px; padding: 20px;">
                    <div class="body-text">Visible Cart Value</div>
                    <h4>Rs. {{ number_format((float) $summary['value'], 2) }}</h4>
                </div>
            </div>

            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" method="GET" action="{{ route('admin.carts.index') }}">
                        <fieldset class="name">
                            <input
                                type="text"
                                placeholder="Search by cart, user, email, product, SKU..."
                                name="search"
                                tabindex="2"
                                value="{{ $search }}"
                            >
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Contact</th>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Added On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($carts as $cart)
                                @php
                                    $product = $cart->product;
                                    $user = $cart->user;
                                    $price = $product?->price ?? 0;
                                @endphp
                                <tr>
                                    <td>{{ $cart->id }}</td>
                                    <td class="pname">
                                        <div class="name">
                                            <span class="body-title-2">{{ $user?->name ?? 'Guest / Deleted User' }}</span>
                                            <div class="text-tiny mt-3">User ID: {{ $user?->id ?? 'N/A' }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $user?->email ?? 'N/A' }}</div>
                                        <div class="text-tiny mt-3">Phone: {{ data_get($user, 'phone', 'N/A') }}</div>
                                        <div class="text-tiny mt-3">Address: {{ data_get($user, 'address', 'N/A') }}</div>
                                    </td>
                                    <td>{{ $product?->name ?? 'Product unavailable' }}</td>
                                    <td>{{ $product?->sku ?? 'N/A' }}</td>
                                    <td>Rs. {{ number_format((float) $price, 2) }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>Rs. {{ number_format((float) $price * $cart->quantity, 2) }}</td>
                                    <td>{{ $cart->created_at?->format('d M Y, h:i A') ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No cart items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $carts->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
