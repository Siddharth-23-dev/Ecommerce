@extends('layouts.app')

@section('title', 'My Mushroom World | About Us')

@section('content')
  <section class="mwm-section">
    <div class="container">
      <div class="mwm-page-hero">
        <div class="mwm-page-hero__copy">
          <span class="mwm-kicker">About Us</span>
          <h1>To take you into a world of purity, vitality, and grounded visual trust.</h1>
          <p>
            About page ko reference site ke story-driven format mein redesign kiya gaya hai so brand narrative, values, and proof blocks sab ek premium wellness voice mein read karein.
          </p>
        </div>
        <div class="mwm-page-hero__media">
          <img src="https://mymushroomworld.com/cdn/shop/files/Group-140-e1724827862630.png?height=628&pad_color=ffffff&v=1728900951&width=1200" alt="About My Mushroom World" />
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <article class="mwm-about-story">
        <div class="mwm-about-story__media">
          <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_KabzX_jpg.jpg?v=1772541393" alt="Brand story" />
        </div>
        <div class="mwm-about-story__body">
          <span class="mwm-kicker">Nature's Love Notes</span>
          <h2>Largest manufacturers of ayurvedic mushroom product inspired storefront storytelling.</h2>
          <p>This page now mirrors the reference brand's calm authority with rich headings, softer panels, and an editorial split layout.</p>
          <ul class="mwm-story-list">
            <li>Sourcing, validation, and quality signals are highlighted more clearly.</li>
            <li>Long-form brand copy now sits inside a cleaner visual hierarchy.</li>
            <li>The section system can scale to certificates, founder notes, and process content.</li>
          </ul>
        </div>
      </article>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-stat-grid">
        <article class="mwm-stat-card">
          <strong>15</strong>
          <p>Wonderful years of dedication reflected in premium story sections.</p>
        </article>
        <article class="mwm-stat-card">
          <strong>3</strong>
          <p>Core proof layers: sourcing, validation, and quality presentation.</p>
        </article>
        <article class="mwm-stat-card">
          <strong>100%</strong>
          <p>Unified visual system shared across hero, content, and CTA areas.</p>
        </article>
        <article class="mwm-stat-card">
          <strong>4</strong>
          <p>Major pages aligned into one mushroom-inspired storefront identity.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Our Process</span>
          <h2>Realistic validation, enveloping quality, and a clearer brand narrative.</h2>
        </div>
      </div>

      <div class="mwm-process-grid">
        <article class="mwm-process-card">
          <span class="mwm-process-card__index">01</span>
          <h3>Sourcing</h3>
          <p>Earthy colors and framed imagery establish a natural, ingredient-first tone from the first fold.</p>
        </article>
        <article class="mwm-process-card">
          <span class="mwm-process-card__index">02</span>
          <h3>Validation</h3>
          <p>Content blocks now look more trustworthy because spacing, card treatment, and type hierarchy are consistent.</p>
        </article>
        <article class="mwm-process-card">
          <span class="mwm-process-card__index">03</span>
          <h3>Crafting</h3>
          <p>The page supports founder-story or certification content without returning to a generic template look.</p>
        </article>
        <article class="mwm-process-card">
          <span class="mwm-process-card__index">04</span>
          <h3>Presentation</h3>
          <p>Final sections feel more premium and closer to the reference site's emotional tone.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-value-grid">
        <article class="mwm-value-card">
          <h3>Pure direction</h3>
          <p>Warm surfaces, elegant serif headlines, and rounded cards keep the page anchored in wellness luxury.</p>
        </article>
        <article class="mwm-value-card">
          <h3>Premium trust</h3>
          <p>Every stat, process point, and CTA now sits in a visually reliable container.</p>
        </article>
        <article class="mwm-value-card">
          <h3>Reusable system</h3>
          <p>The same component language can now support founder profiles, recognitions, and policy content later.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-cta-panel">
        <span class="mwm-kicker">Continue Exploring</span>
        <h2 style="font-size: clamp(2.2rem, 4vw, 3.4rem);">The brand story now matches the same premium feel as the home and shop pages.</h2>
        <p style="margin-top: 14px; max-width: 720px;">If you want, the same UI language can be extended next into product, cart, and checkout pages as well.</p>
        <div class="mwm-hero__actions">
          <a href="{{ route('shop') }}" class="mwm-btn mwm-btn--primary">Visit Shop</a>
          <a href="{{ route('contact') }}" class="mwm-btn mwm-btn--secondary">Contact Us</a>
        </div>
      </div>
    </div>
  </section>
@endsection
