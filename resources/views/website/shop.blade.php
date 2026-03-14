@extends('layouts.app')

@section('content')
  <section class="page-hero page-hero--shop">
    <div class="container">
      <div class="page-hero__content">
        <span class="eyebrow">Catalogue</span>
        <h1>Shop modern essentials with a premium storefront feel.</h1>
        <p>Browse curated edits, stronger product presentation, and cleaner ecommerce browsing across every category.</p>
      </div>
    </div>
  </section>

  <section class="store-section">
    <div class="container shop-layout">
      <aside class="filter-card">
        <div class="filter-card__block">
          <h3>Categories</h3>
          <a href="#">Women</a>
          <a href="#">Men</a>
          <a href="#">Outerwear</a>
          <a href="#">Footwear</a>
          <a href="#">Accessories</a>
        </div>

        <div class="filter-card__block">
          <h3>Price</h3>
          <a href="#">Under $25</a>
          <a href="#">$25 - $50</a>
          <a href="#">$50 - $100</a>
          <a href="#">Above $100</a>
        </div>

        <div class="filter-card__block">
          <h3>Highlights</h3>
          <a href="#">New arrivals</a>
          <a href="#">Best sellers</a>
          <a href="#">Limited stock</a>
        </div>
      </aside>

      <div>
        <div class="section-heading section-heading--compact">
          <div>
            <span class="eyebrow">36 products</span>
            <h2>Best sellers and new-season picks</h2>
          </div>
          <div class="sort-chip">Sort: Featured</div>
        </div>

        <div class="product-grid">
          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_0.jpg') }}" alt="Classic full sleeve tee" />
              <span class="product-badge">New</span>
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Essentials</span>
              <h3>Classic Full Sleeve Tee</h3>
              <div class="product-card-store__price"><strong>$24</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_1.jpg') }}" alt="Minimal denim jacket" />
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Outerwear</span>
              <h3>Minimal Denim Jacket</h3>
              <div class="product-card-store__price"><strong>$78</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_4.jpg') }}" alt="Structured leather jacket" />
              <span class="product-badge product-badge--dark">Popular</span>
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Statement</span>
              <h3>Structured Leather Jacket</h3>
              <div class="product-card-store__price"><strong>$129</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_7.jpg') }}" alt="Neutral tailored set" />
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Tailored</span>
              <h3>Neutral Tailored Set</h3>
              <div class="product-card-store__price"><strong>$88</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_8.jpg') }}" alt="Soft knit cardigan" />
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Knitwear</span>
              <h3>Soft Knit Cardigan</h3>
              <div class="product-card-store__price"><strong>$54</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_9.jpg') }}" alt="Relaxed street shirt" />
              <span class="product-badge product-badge--sale">-20%</span>
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Casualwear</span>
              <h3>Relaxed Street Shirt</h3>
              <div class="product-card-store__price"><strong>$42</strong><del>$52</del></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_10.jpg') }}" alt="Everyday tote bag" />
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Accessories</span>
              <h3>Everyday Tote Bag</h3>
              <div class="product-card-store__price"><strong>$39</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>

          <article class="product-card-store">
            <div class="product-card-store__media">
              <img src="{{ asset('assets/website/images/products/product_6.jpg') }}" alt="Clean white sneakers" />
            </div>
            <div class="product-card-store__body">
              <span class="product-card-store__meta">Footwear</span>
              <h3>Clean White Sneakers</h3>
              <div class="product-card-store__price"><strong>$67</strong></div>
              <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
@endsection
