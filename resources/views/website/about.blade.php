@extends('layouts.app')

@section('content')
  <section class="page-hero page-hero--about">
    <div class="container">
      <div class="page-hero__content">
        <span class="eyebrow">About Surfside</span>
        <h1>Built to feel like a modern ecommerce brand, not a raw template.</h1>
        <p>We curate polished essentials and present them with stronger visual structure, cleaner layout balance, and premium-first design.</p>
      </div>
    </div>
  </section>

  <section class="store-section">
    <div class="container about-grid">
      <div class="about-copy-card">
        <span class="eyebrow">Our approach</span>
        <h2>Fashion retail with clarity, consistency, and better presentation.</h2>
        <p>
          Surfside focuses on versatile wardrobe pieces designed for modern shoppers who want polished looks without a cluttered buying experience.
        </p>
        <p>
          From homepage hierarchy to product framing, every section is designed to feel trustworthy, premium, and conversion-friendly.
        </p>
      </div>

      <div class="about-visual-card">
        <img src="{{ asset('assets/website/images/about/about-1.jpg') }}" alt="Surfside studio lookbook" />
      </div>
    </div>
  </section>

  <section class="store-section store-section--contrast">
    <div class="container value-grid">
      <article class="value-card">
        <h3>Curated assortment</h3>
        <p>Focused collections instead of noisy endless browsing.</p>
      </article>
      <article class="value-card">
        <h3>Premium presentation</h3>
        <p>Balanced image sizing, stronger product cards, and clearer hierarchy.</p>
      </article>
      <article class="value-card">
        <h3>Customer-first flow</h3>
        <p>Pages structured to feel dependable, intuitive, and ready to shop.</p>
      </article>
    </div>
  </section>
@endsection
