@extends('layouts.app')

@section('content')
  <section class="hero-section">
    <div class="container">
      <div class="hero-grid">
        <div class="hero-copy">
          <span class="eyebrow">Spring / Summer 2026</span>
          <h1>Elevated everyday fashion for a sharper storefront.</h1>
          <p>
            Premium silhouettes, cleaner fits, and a modern catalogue presentation built for serious ecommerce.
          </p>
          <div class="hero-actions">
            <a href="{{ route('shop') }}" class="btn-primary-store">Shop Collection</a>
            <a href="{{ route('about') }}" class="btn-secondary-store">Our Story</a>
          </div>

          <div class="hero-metrics">
            <div>
              <strong>2k+</strong>
              <span>happy customers</span>
            </div>
            <div>
              <strong>120+</strong>
              <span>new arrivals</span>
            </div>
            <div>
              <strong>4.8/5</strong>
              <span>store rating</span>
            </div>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-card hero-card--primary">
            <img src="{{ asset('assets/website/images/home/demo3/slideshow-character1.png') }}" alt="Featured fashion look" />
          </div>
          <div class="hero-card hero-card--accent">
            <img src="{{ asset('assets/website/images/slideshow-character2.png') }}" alt="Seasonal collection" />
          </div>
          <div class="hero-note">
            <span>Editor’s pick</span>
            <strong>Tailored neutrals with everyday comfort.</strong>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="trust-strip">
    <div class="container trust-strip__grid">
      <div><strong>Free Delivery</strong><span>On prepaid orders above $99</span></div>
      <div><strong>Easy Returns</strong><span>7-day hassle-free exchange</span></div>
      <div><strong>Premium Edit</strong><span>Curated looks for men and women</span></div>
      <div><strong>Secure Checkout</strong><span>Trusted payment experience</span></div>
    </div>
  </section>

  <section class="store-section">
    <div class="container">
      <div class="section-heading">
        <div>
          <span class="eyebrow">Shop by category</span>
          <h2>Collections that look consistent and sell better</h2>
        </div>
        <a href="{{ route('shop') }}" class="section-link">View all categories</a>
      </div>

      <div class="category-grid">
        <a href="{{ route('shop') }}" class="category-card">
          <div class="category-card__media">
            <img src="{{ asset('assets/website/images/home/demo3/category_1.png') }}" alt="Women tops" />
          </div>
          <h3>Women Tops</h3>
          <p>Clean layers and polished essentials</p>
        </a>

        <a href="{{ route('shop') }}" class="category-card">
          <div class="category-card__media">
            <img src="{{ asset('assets/website/images/home/demo3/category_4.png') }}" alt="Denim collection" />
          </div>
          <h3>Denim</h3>
          <p>Relaxed cuts with contemporary structure</p>
        </a>

        <a href="{{ route('shop') }}" class="category-card">
          <div class="category-card__media">
            <img src="{{ asset('assets/website/images/home/demo3/category_6.png') }}" alt="Shoes" />
          </div>
          <h3>Footwear</h3>
          <p>Street-ready pairs for daily wear</p>
        </a>

        <a href="{{ route('shop') }}" class="category-card">
          <div class="category-card__media">
            <img src="{{ asset('assets/website/images/home/demo3/category_7.png') }}" alt="Dresses" />
          </div>
          <h3>Dresses</h3>
          <p>Statement silhouettes for the season</p>
        </a>
      </div>
    </div>
  </section>

  <section class="store-section store-section--contrast">
    <div class="container">
      <div class="section-heading">
        <div>
          <span class="eyebrow">Featured products</span>
          <h2>Best performing styles from the current drop</h2>
        </div>
        <a href="{{ route('shop') }}" class="section-link">Browse catalogue</a>
      </div>

      <div class="product-grid">
        <article class="product-card-store">
          <div class="product-card-store__media">
            <img src="{{ asset('assets/website/images/home/demo3/product-4.jpg') }}" alt="Cropped Faux Leather Jacket" />
            <span class="product-badge">New</span>
          </div>
          <div class="product-card-store__body">
            <span class="product-card-store__meta">Outerwear</span>
            <h3>Cropped Faux Leather Jacket</h3>
            <div class="product-card-store__price">
              <strong>$29</strong>
            </div>
            <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
          </div>
        </article>

        <article class="product-card-store">
          <div class="product-card-store__media">
            <img src="{{ asset('assets/website/images/home/demo3/product-5.jpg') }}" alt="Calvin Shorts" />
          </div>
          <div class="product-card-store__body">
            <span class="product-card-store__meta">Bottomwear</span>
            <h3>Calvin Shorts</h3>
            <div class="product-card-store__price">
              <strong>$62</strong>
            </div>
            <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
          </div>
        </article>

        <article class="product-card-store">
          <div class="product-card-store__media">
            <img src="{{ asset('assets/website/images/home/demo3/product-6.jpg') }}" alt="Kirby T-Shirt" />
            <span class="product-badge product-badge--dark">Popular</span>
          </div>
          <div class="product-card-store__body">
            <span class="product-card-store__meta">Essentials</span>
            <h3>Kirby T-Shirt</h3>
            <div class="product-card-store__price">
              <strong>$17</strong>
            </div>
            <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
          </div>
        </article>

        <article class="product-card-store">
          <div class="product-card-store__media">
            <img src="{{ asset('assets/website/images/home/demo3/product-7.jpg') }}" alt="Cableknit Shawl" />
            <span class="product-badge product-badge--sale">-67%</span>
          </div>
          <div class="product-card-store__body">
            <span class="product-card-store__meta">Layering</span>
            <h3>Cableknit Shawl</h3>
            <div class="product-card-store__price">
              <strong>$99</strong>
              <del>$129</del>
            </div>
            <a href="{{ route('cart') }}" class="product-card-store__cta">Add to cart</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="store-section">
    <div class="container promo-grid">
      <article class="promo-card">
        <div class="promo-card__copy">
          <span class="eyebrow">Tailored essentials</span>
          <h2>Sharp layers built for weekday polish</h2>
          <p>Modern fits, versatile palettes, and premium textures for a more elevated catalogue.</p>
          <a href="{{ route('shop') }}" class="section-link">Shop blazers</a>
        </div>
        <div class="promo-card__media">
          <img src="{{ asset('assets/website/images/home/demo3/category_9.jpg') }}" alt="Blazers collection" />
        </div>
      </article>

      <article class="promo-card promo-card--dark">
        <div class="promo-card__copy">
          <span class="eyebrow">Sportswear edit</span>
          <h2>Comfort-driven pieces with premium visual balance</h2>
          <p>Professional product presentation, stronger hierarchy, and tighter spacing across every viewport.</p>
          <a href="{{ route('shop') }}" class="section-link section-link--light">Explore now</a>
        </div>
        <div class="promo-card__media">
          <img src="{{ asset('assets/website/images/home/demo3/category_10.jpg') }}" alt="Sportswear collection" />
        </div>
      </article>
    </div>
  </section>

  <section class="store-section store-section--compact">
    <div class="container newsletter-panel">
      <div>
        <span class="eyebrow">Stay updated</span>
        <h2>Weekly drops, sale alerts, and styling inspiration.</h2>
      </div>
      <form class="newsletter-panel__form">
        <input type="email" placeholder="Enter your email address" aria-label="Email address" />
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </section>
@endsection
