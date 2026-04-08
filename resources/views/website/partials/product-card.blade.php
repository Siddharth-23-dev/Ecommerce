@php
  $price = (float) ($product->price ?? 0);
  $discount = (float) ($product->discount ?? 0);
  $finalPrice = max($price - $discount, 0);
@endphp

<article class="mwm-product-card">
  <a href="{{ route('product.show', $product->slug) }}" class="mwm-product-card__media">
    <img src="{{ $product->image }}" alt="{{ $product->name }}" />
  </a>
  <div class="mwm-product-card__body">
    <span class="mwm-product-card__meta">{{ $product->category?->name ?? 'Collection' }} / {{ $product->brand?->name ?? 'Brand' }}</span>
    <h3>
      <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
    </h3>
    <p>Nature-led wellness support for everyday performance and balance.</p>
    <div class="mwm-product-card__price">
      <strong>Rs. {{ number_format($finalPrice, 0) }}</strong>
      @if($discount > 0)
        <del>Rs. {{ number_format($price, 0) }}</del>
      @endif
    </div>
    <div style="display: flex; gap: 8px; margin-top: auto;">
      @if($product->is_added_in_cart ?? false)
        <a href="{{ route('cart') }}" class="mwm-btn mwm-btn--primary" style="flex: 1; min-height: 44px; font-size: 12px; display: flex; align-items: center; justify-content: center; background: var(--mwm-accent-dark); color: white; border: 0;">Go to Cart</a>
      @else
        <button class="mwm-btn mwm-btn--primary add-to-cart-btn" data-id="{{ $product->id }}" style="flex: 1; min-height: 44px; font-size: 12px;">Add to Cart</button>
      @endif
      <a href="{{ route('product.show', $product->slug) }}" class="mwm-btn mwm-btn--secondary" style="min-height: 44px; min-width: 44px; padding: 0 14px; display: flex; align-items: center; justify-content: center;">
        View
      </a>
    </div>
  </div>
</article>
