@extends('layouts.app')

@section('title', 'My Mushroom World | Home')

@section('content')
  <section class="mwm-section mwm-section--tight">
    <div class="container">
      @if($banners->isNotEmpty())
        @php($hero = $banners->first())
        <div class="mwm-hero">
          <div class="mwm-hero__copy">
            @if($hero->badge)
              <span class="mwm-kicker">{{ $hero->badge }}</span>
            @endif
            <h1>{{ $hero->title }}</h1>
            <p>{{ $hero->description }}</p>
            <div class="mwm-hero__actions">
              <a href="{{ $hero->primary_button_link ?: route('shop') }}" class="mwm-btn mwm-btn--primary">
                {{ $hero->primary_button_text ?: 'Shop Now' }}
              </a>
              @if($hero->secondary_button_text && $hero->secondary_button_link)
                <a href="{{ $hero->secondary_button_link }}" class="mwm-btn mwm-btn--secondary">
                  {{ $hero->secondary_button_text }}
                </a>
              @endif
            </div>
            @if($hero->note_label || $hero->note_text)
              <div class="mwm-badge" style="margin-top: 20px;">
                {{ trim(($hero->note_label ? $hero->note_label . ': ' : '') . ($hero->note_text ?? '')) }}
              </div>
            @endif
          </div>
          <div class="mwm-hero__media">
            <img src="{{ $hero->image }}" alt="{{ $hero->title }}">
          </div>
        </div>
      @else
        <div class="mwm-empty-state">No banners available yet.</div>
      @endif
    </div>
  </section>

  <section class="mwm-section mwm-section--tight">
    <div class="container">
      <div class="mwm-icon-strip">
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">01</span>
          <div>
            <strong>Authentic Sourcing</strong>
            <p>Wellness products selected around trust, consistency, and ingredient quality.</p>
          </div>
        </article>
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">02</span>
          <div>
            <strong>Category Led</strong>
            <p>Home page ab category-wise discovery flow follow karta hai for faster browsing.</p>
          </div>
        </article>
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">03</span>
          <div>
            <strong>Fast Checkout</strong>
            <p>Users can jump from discovery to cart and product detail without dead-end pages.</p>
          </div>
        </article>
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">04</span>
          <div>
            <strong>Admin Ready</strong>
            <p>Orders, carts, and catalog presentation now connect to real project data.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Featured Products</span>
          <h2>Top picks from across the catalogue.</h2>
        </div>
        <a href="{{ route('shop') }}" class="mwm-link-button">Browse all products</a>
      </div>

      <div class="mwm-product-grid">
        @forelse($featuredProducts as $product)
          @include('website.partials.product-card', ['product' => $product])
        @empty
          <div class="mwm-empty-state">No featured products available.</div>
        @endforelse
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Shop By Category</span>
          <h2>Explore the product range category wise.</h2>
        </div>
        <a href="{{ route('shop') }}" class="mwm-link-button">Explore full catalogue</a>
      </div>

      <div class="mwm-category-grid">
        @forelse($categories as $category)
          <article class="mwm-category-card">
            <div class="mwm-category-card__media">
              <img src="{{ $category->image }}" alt="{{ $category->name }}">
            </div>
            <div class="mwm-category-card__body">
              <h3>{{ $category->name }}</h3>
              <p>Browse curated products from this collection.</p>
              <a href="{{ route('shop', ['category' => $category->slug]) }}" class="mwm-link-button">View category</a>
            </div>
          </article>
        @empty
          <div class="mwm-empty-state">No categories available.</div>
        @endforelse
      </div>
    </div>
  </section>

  @foreach($categorySections as $section)
    @php($category = $section['category'])
    @php($products = $section['products'])
    <section class="mwm-section">
      <div class="container">
        <div class="mwm-section-heading">
          <div>
            <span class="mwm-kicker">{{ $category->name }}</span>
            <h2>{{ $category->name }} collection</h2>
          </div>
          <a href="{{ route('shop', ['category' => $category->slug]) }}" class="mwm-link-button">See all in {{ $category->name }}</a>
        </div>

        <div class="mwm-story-panel" style="margin-bottom: 24px;">
          <div class="mwm-story-panel__media">
            <img src="{{ $category->image }}" alt="{{ $category->name }}">
          </div>
          <div class="mwm-story-panel__body">
            <span class="mwm-kicker">Category Spotlight</span>
            <h2>{{ $category->name }}</h2>
            <p>Freshly grouped products from the {{ strtolower($category->name) }} range so the home page surfaces category-wise discovery instead of a flat list.</p>
          </div>
        </div>

        <div class="mwm-product-grid">
          @foreach($products as $product)
            @include('website.partials.product-card', ['product' => $product])
          @endforeach
        </div>
      </div>
    </section>
  @endforeach
@endsection

@push('scripts')
  @include('website.partials.add-to-cart-script')
@endpush
