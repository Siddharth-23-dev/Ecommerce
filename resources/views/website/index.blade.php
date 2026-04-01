@extends('layouts.app')

@section('title', 'My Mushroom World | Home')

@section('content')
  <section class="mwm-section">
    <div class="container">
      <div class="mwm-hero">
        <div class="mwm-hero__copy">
          <span class="mwm-kicker">Mushroom Wellness Store</span>
          <h1>Nature's finest, crafted for your daily balance and vitality.</h1>
          <p>
            Home page ko reference site ke same earthy, premium, rounded-card direction mein rebuild kiya gaya hai so the storefront feels like a polished mushroom wellness brand instead of a raw template.
          </p>

          <div class="mwm-hero__actions">
            <a href="{{ route('shop') }}" class="mwm-btn mwm-btn--primary">Shop Our Range</a>
            <a href="{{ route('about') }}" class="mwm-btn mwm-btn--secondary">Our Story</a>
          </div>

          <div class="mwm-hero__metrics">
            <div class="mwm-metric-card">
              <strong>15+</strong>
              <p>Years of wellness-led storytelling and crafted presentation.</p>
            </div>
            <div class="mwm-metric-card">
              <strong>4</strong>
              <p>Core storefront pages rebuilt into one consistent visual language.</p>
            </div>
            <div class="mwm-metric-card">
              <strong>INR</strong>
              <p>Pricing tone, premium texture, and product card rhythm inspired by the reference.</p>
            </div>
          </div>
        </div>

        <div class="mwm-hero__visual">
          <article class="mwm-hero-card">
            <div class="mwm-hero-card__media">
              <img src="https://mymushroomworld.com/cdn/shop/files/Group-140-e1724827862630.png?height=628&pad_color=ffffff&v=1728900951&width=1200" alt="Mushroom brand hero" />
            </div>
            <div class="mwm-hero-card__body">
              <span class="mwm-badge">Trusted wellness direction</span>
              <p style="margin-top: 14px;">Soft beige layers, golden accents, organic curves, and premium product framing mirror the visual cadence of `mymushroomworld.com`.</p>
            </div>
          </article>

          <div class="mwm-panel mwm-hero-mini">
            <span class="mwm-brand__seal">MW</span>
            <div>
              <span class="mwm-product-card__meta">Store Refresh</span>
              <h3 style="font-size: 32px;">Shop, story, support, and landing pages now feel unified.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section mwm-section--tight">
    <div class="container">
      <div class="mwm-icon-strip">
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">01</span>
          <div>
            <strong>Handpicked</strong>
            <p>Rounded premium sections with calmer spacing and warmer tones.</p>
          </div>
        </article>
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">02</span>
          <div>
            <strong>Certified</strong>
            <p>Clear hierarchy for trust strips, features, and social proof blocks.</p>
          </div>
        </article>
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">03</span>
          <div>
            <strong>Authentic</strong>
            <p>Visual language closely aligned to the mushroom wellness reference.</p>
          </div>
        </article>
        <article class="mwm-icon-card">
          <span class="mwm-icon-card__seal">04</span>
          <div>
            <strong>Sustainable</strong>
            <p>Reusable layout system ready to extend across more storefront pages.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Shop Our Bestsellers</span>
          <h2>Nature's finest, crafted for you.</h2>
        </div>
        <a href="{{ route('shop') }}" class="mwm-link-button">Browse all products</a>
      </div>

      <div id="homeBestsellerGrid" class="mwm-product-grid">
        <div class="mwm-empty-state">Loading products...</div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Our Product Range</span>
          <h2>Discover a world of wellness with the power of mushrooms.</h2>
        </div>
        <a href="{{ route('shop') }}" class="mwm-link-button">Explore categories</a>
      </div>

      <div id="homeRangeGrid" class="mwm-category-grid">
        <div class="mwm-empty-state">Loading categories...</div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Magic Of Our Mushrooms</span>
          <h2>Discover a premium storefront rhythm designed around trust and texture.</h2>
        </div>
      </div>

      <div class="mwm-feature-grid">
        <article class="mwm-feature-card">
          <span class="mwm-feature-card__seal">A</span>
          <h3>Handpicked details</h3>
          <p>Large editorial headings, centered breathing room, and curved containers echo the reference site.</p>
        </article>
        <article class="mwm-feature-card">
          <span class="mwm-feature-card__seal">B</span>
          <h3>Conversion clarity</h3>
          <p>CTA buttons, price hierarchy, and content grouping are sharper and easier to scan.</p>
        </article>
        <article class="mwm-feature-card">
          <span class="mwm-feature-card__seal">C</span>
          <h3>Responsive polish</h3>
          <p>The new sections collapse cleanly on mobile without losing the same premium feel.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <article class="mwm-story-panel">
        <div class="mwm-story-panel__media">
          <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072" alt="Crafted product presentation" />
        </div>
        <div class="mwm-story-panel__body">
          <span class="mwm-kicker">Carefully Crafted</span>
          <h2>Our products and pages are now crafted with the same earthy luxury tone.</h2>
          <p>The rebuilt home page carries the same soft contrast blocks, premium product emphasis, and warm visual layering found in the reference experience.</p>
          <ul class="mwm-story-list">
            <li>Hero and feature sections reorganized into a stronger storytelling flow.</li>
            <li>Product and category cards now feel like a coordinated brand family.</li>
            <li>Footer and navigation match the same calm, rounded mushroom-site language.</li>
          </ul>
        </div>
      </article>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Awards & Recognition</span>
          <h2>Experience the healing power of a brand presentation built to feel celebrated.</h2>
        </div>
      </div>

      <div class="mwm-award-grid">
        <div class="mwm-award-item">
          <strong>01</strong>
          <p>Editorial hero layout with premium layered gradients.</p>
        </div>
        <div class="mwm-award-item">
          <strong>02</strong>
          <p>Rounded product merchandising system for homepage and shop.</p>
        </div>
        <div class="mwm-award-item">
          <strong>03</strong>
          <p>Reusable content cards for story, support, and trust sections.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Our Latest Notes</span>
          <h2>Blog-style content blocks matching the reference storefront rhythm.</h2>
        </div>
      </div>

      <div class="mwm-blog-grid">
        <article class="mwm-blog-card">
          <div class="mwm-blog-card__media">
            <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/WhatsApp_Image_2026-02-21_at_11.51.50_AM.jpg?v=1771655525" alt="Weight gain wellness article" />
          </div>
          <div class="mwm-blog-card__body">
            <span class="mwm-blog-card__meta">March 8, 2025</span>
            <h3>Stop believing generic product layouts.</h3>
            <p>Homepage sections now tell a story instead of looking like isolated template blocks.</p>
          </div>
        </article>
        <article class="mwm-blog-card">
          <div class="mwm-blog-card__media">
            <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXPowderSlide1.png?v=1773404065" alt="Performance wellness article" />
          </div>
          <div class="mwm-blog-card__body">
            <span class="mwm-blog-card__meta">Design refresh</span>
            <h3>Forget flat sections, build immersive product-first pages.</h3>
            <p>The new UI introduces depth, hierarchy, and card treatment closer to the benchmark site.</p>
          </div>
        </article>
        <article class="mwm-blog-card">
          <div class="mwm-blog-card__media">
            <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/LucoXSlide1.png?v=1773920411" alt="Wellness article" />
          </div>
          <div class="mwm-blog-card__body">
            <span class="mwm-blog-card__meta">Store strategy</span>
            <h3>Product storytelling now carries through the full storefront.</h3>
            <p>Home, About, Contact, and Shop all share the same mushroom-luxury visual system.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Our Brand's Presenters</span>
          <h2>Visual variety blocks inspired by the multi-card sections on the reference home page.</h2>
        </div>
      </div>

      <div class="mwm-presenter-grid">
        <article class="mwm-presenter-card">
          <div class="mwm-presenter-card__media">
            <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXCapsuleSlide1.png?v=1773404187" alt="Presenter card one" />
          </div>
          <div class="mwm-presenter-card__body">
            <h3>Stronger product theatre</h3>
            <p>Large, framed visuals create premium momentum before the user reaches the shop page.</p>
          </div>
        </article>
        <article class="mwm-presenter-card">
          <div class="mwm-presenter-card__media">
            <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/KabzX-5_1.25x_1.25x_8daf18c6-de1d-4ba1-b051-8b68b6c7c70d.jpg?v=1772541393" alt="Presenter card two" />
          </div>
          <div class="mwm-presenter-card__body">
            <h3>Warmer visual identity</h3>
            <p>Earthy gradients and off-white surfaces help the storefront feel intentional and brand-specific.</p>
          </div>
        </article>
        <article class="mwm-presenter-card">
          <div class="mwm-presenter-card__media">
            <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXPowderSlide2.png?v=1773403822" alt="Presenter card three" />
          </div>
          <div class="mwm-presenter-card__body">
            <h3>Consistent page family</h3>
            <p>The same rounded premium language now connects discovery, trust, and support sections.</p>
          </div>
        </article>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', async function () {
      const bestsellerGrid = document.getElementById('homeBestsellerGrid');
      const rangeGrid = document.getElementById('homeRangeGrid');
      const homeApiUrl = @json(url('/api/home'));
      const shopUrl = @json(route('shop'));
      const currencyFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        maximumFractionDigits: 0
      });

      const fallbackProducts = [
        { name: 'Mushroomex Weight Gainer', category: { name: 'Bestseller', slug: 'bestseller' }, price: 379, discount: 0, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/WhatsApp_Image_2026-02-21_at_11.51.50_AM.jpg?v=1771655525' },
        { name: 'ShilajitX Gold Resin', category: { name: 'Ayurvedic Resin', slug: 'resin' }, price: 1849, discount: 404, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072' },
        { name: 'MENZ-X Capsule', category: { name: 'Performance', slug: 'performance' }, price: 1750, discount: 350, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXCapsuleSlide1.png?v=1773404187' },
        { name: 'LUCOX Capsule', category: { name: 'Wellness', slug: 'wellness' }, price: 1499, discount: 180, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/LucoXSlide1.png?v=1773920411' }
      ];

      const fallbackCategories = [
        { name: 'Mushroom Powders', slug: 'mushroom-powders', image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXPowderSlide1.png?v=1773404065' },
        { name: 'Capsules', slug: 'capsules', image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXCapsuleSlide1.png?v=1773404187' },
        { name: 'Resins', slug: 'resins', image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072' },
        { name: 'Digestive Care', slug: 'digestive-care', image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_KabzX_jpg.jpg?v=1772541393' }
      ];

      function escapeHtml(value) {
        return String(value ?? '')
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#39;');
      }

      function buildShopLink(params = {}) {
        const url = new URL(shopUrl, window.location.origin);

        Object.entries(params).forEach(function ([key, value]) {
          if (value) {
            url.searchParams.set(key, value);
          }
        });

        return `${url.pathname}${url.search}`;
      }

      function renderProducts(products) {
        bestsellerGrid.innerHTML = products.map(function (product) {
          const price = Number(product.price || 0);
          const discount = Number(product.discount || 0);
          const salePrice = Math.max(price - discount, 0);
          const categoryName = escapeHtml(product.category?.name || 'Featured');
          const categorySlug = product.category?.slug || '';

          return `
            <article class="mwm-product-card">
              <div class="mwm-product-card__media">
                <img src="${escapeHtml(product.image)}" alt="${escapeHtml(product.name)}" />
              </div>
              <div class="mwm-product-card__body">
                <span class="mwm-product-card__meta">${categoryName}</span>
                <h3>${escapeHtml(product.name)}</h3>
                <p>Premium rounded product merchandising inspired by the reference storefront.</p>
                <div class="mwm-product-card__price">
                  <strong>${currencyFormatter.format(salePrice)}</strong>
                  ${discount > 0 ? `<del>${currencyFormatter.format(price)}</del>` : ''}
                </div>
                <a href="${buildShopLink({ category: categorySlug })}" class="mwm-link-button">View in shop</a>
              </div>
            </article>
          `;
        }).join('');
      }

      function renderCategories(categories) {
        rangeGrid.innerHTML = categories.map(function (category) {
          return `
            <a href="${buildShopLink({ category: category.slug || '' })}" class="mwm-category-card">
              <div class="mwm-category-card__media">
                <img src="${escapeHtml(category.image)}" alt="${escapeHtml(category.name)}" />
              </div>
              <div class="mwm-category-card__body">
                <span class="mwm-category-card__meta">Product range</span>
                <h3>${escapeHtml(category.name)}</h3>
                <p>Discover curated layouts and category-first browsing.</p>
              </div>
            </a>
          `;
        }).join('');
      }

      try {
        const response = await fetch(homeApiUrl, {
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        if (!response.ok) {
          throw new Error(`Request failed with status ${response.status}`);
        }

        const payload = await response.json();
        const products = payload?.data?.products?.slice(0, 4) || [];
        const categories = payload?.data?.categories?.slice(0, 4) || [];

        renderProducts(products.length ? products : fallbackProducts);
        renderCategories(categories.length ? categories : fallbackCategories);
      } catch (error) {
        console.error('Unable to load homepage data:', error);
        renderProducts(fallbackProducts);
        renderCategories(fallbackCategories);
      }
    });
  </script>
@endpush
