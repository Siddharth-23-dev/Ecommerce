@extends('layouts.app')

@section('content')
  <section class="page-hero page-hero--cart">
    <div class="container">
      <div class="page-hero__content">
        <span class="eyebrow">Cart</span>
        <h1>Review your picks before checkout.</h1>
        <p>Clean cart layout, strong product hierarchy, and a more premium ecommerce checkout experience.</p>
      </div>
    </div>
  </section>

  <section class="store-section">
    <div class="container cart-layout">
      <div class="cart-list-card">
        <article class="cart-item-store">
          <div class="cart-item-store__media">
            <img src="{{ asset('assets/website/images/cart-item-1.jpg') }}" alt="Kirby T-Shirt" />
          </div>
          <div class="cart-item-store__body">
            <span class="product-card-store__meta">Essentials</span>
            <h3>Kirby T-Shirt</h3>
            <p>Soft everyday cotton with a sharp silhouette.</p>
          </div>
          <div class="cart-item-store__meta-block">
            <span>Qty</span>
            <strong>1</strong>
          </div>
          <div class="cart-item-store__meta-block">
            <span>Price</span>
            <strong>$17</strong>
          </div>
        </article>

        <article class="cart-item-store">
          <div class="cart-item-store__media">
            <img src="{{ asset('assets/website/images/cart-item-2.jpg') }}" alt="Calvin Shorts" />
          </div>
          <div class="cart-item-store__body">
            <span class="product-card-store__meta">Bottomwear</span>
            <h3>Calvin Shorts</h3>
            <p>Relaxed premium fit for versatile daily wear.</p>
          </div>
          <div class="cart-item-store__meta-block">
            <span>Qty</span>
            <strong>2</strong>
          </div>
          <div class="cart-item-store__meta-block">
            <span>Price</span>
            <strong>$124</strong>
          </div>
        </article>

        <article class="cart-item-store">
          <div class="cart-item-store__media">
            <img src="{{ asset('assets/website/images/cart-item-3.jpg') }}" alt="Cableknit Shawl" />
          </div>
          <div class="cart-item-store__body">
            <span class="product-card-store__meta">Layering</span>
            <h3>Cableknit Shawl</h3>
            <p>Statement texture with refined seasonal styling.</p>
          </div>
          <div class="cart-item-store__meta-block">
            <span>Qty</span>
            <strong>1</strong>
          </div>
          <div class="cart-item-store__meta-block">
            <span>Price</span>
            <strong>$99</strong>
          </div>
        </article>
      </div>

      <aside class="summary-card">
        <h2>Order summary</h2>
        <div class="summary-card__row"><span>Subtotal</span><strong>$240</strong></div>
        <div class="summary-card__row"><span>Shipping</span><strong>Free</strong></div>
        <div class="summary-card__row"><span>Tax</span><strong>$12</strong></div>
        <div class="summary-card__row summary-card__row--total"><span>Total</span><strong>$252</strong></div>
        <a href="#" class="btn-primary-store summary-card__button">Proceed to checkout</a>
        <a href="{{ route('shop') }}" class="btn-secondary-store summary-card__button">Continue shopping</a>
      </aside>
    </div>
  </section>
@endsection
