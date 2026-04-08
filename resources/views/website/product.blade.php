@extends('layouts.app')

@section('title', $product->name . ' | My Mushroom World')

@section('content')
  @php
    $price = (float) $product->price;
    $discount = (float) $product->discount;
    $finalPrice = max($price - $discount, 0);
  @endphp

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-page-hero" style="align-items: stretch;">
        <div class="mwm-page-hero__media">
          <img src="{{ $product->image }}" alt="{{ $product->name }}" />
        </div>

        <div class="mwm-page-hero__copy">
          <span class="mwm-kicker">{{ $product->category?->name ?? 'Collection' }}</span>
          <h1>{{ $product->name }}</h1>
          <p>
            Detailed product page with pricing, brand context, SKU, and direct add-to-cart flow.
          </p>

          <ul class="mwm-story-list" style="margin: 20px 0;">
            <li><strong>Brand:</strong> {{ $product->brand?->name ?? 'N/A' }}</li>
            <li><strong>SKU:</strong> {{ $product->sku }}</li>
            <li><strong>Tax:</strong> {{ number_format((float) $product->tax, 0) }}%</li>
          </ul>

          <div class="mwm-product-card__price" style="margin-bottom: 20px;">
            <strong>Rs. {{ number_format($finalPrice, 0) }}</strong>
            @if($discount > 0)
              <del>Rs. {{ number_format($price, 0) }}</del>
            @endif
          </div>

          <div class="mwm-hero__actions">
            @if($product->is_added_in_cart ?? false)
              <a href="{{ route('cart') }}" class="mwm-btn mwm-btn--primary">Go to Cart</a>
            @else
              <button class="mwm-btn mwm-btn--primary add-to-cart-btn" data-id="{{ $product->id }}">Add to Cart</button>
            @endif
            <a href="{{ route('shop', ['category' => $product->category?->slug]) }}" class="mwm-btn mwm-btn--secondary">More In This Category</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-story-panel">
        <div class="mwm-story-panel__body">
          <span class="mwm-kicker">Product Overview</span>
          <h2>Why customers open this page</h2>
          <p>
            This section gives a proper product detail destination instead of dropping users onto a generic page. It carries key commercial info, category context, and a clearer purchase action.
          </p>
          <ul class="mwm-story-list">
            <li>Direct link from home and shop product cards.</li>
            <li>Consistent pricing display with discount handling.</li>
            <li>Related items from the same category for continued browsing.</li>
          </ul>
        </div>
        <div class="mwm-story-panel__media">
          <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Related Products</span>
          <h2>More from {{ $product->category?->name ?? 'this collection' }}</h2>
        </div>
        <a href="{{ route('shop', ['category' => $product->category?->slug]) }}" class="mwm-link-button">View category</a>
      </div>

      <div class="mwm-product-grid">
        @forelse($relatedProducts as $relatedProduct)
          @include('website.partials.product-card', ['product' => $relatedProduct])
        @empty
          <div class="mwm-empty-state">No related products found.</div>
        @endforelse
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  @include('website.partials.add-to-cart-script')
@endpush
