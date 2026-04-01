@extends('layouts.app')

@section('title', 'My Mushroom World | Shop')

@section('content')
  <section class="mwm-section">
    <div class="container">
      <div class="mwm-page-hero">
        <div class="mwm-page-hero__copy">
          <span class="mwm-kicker">Shop</span>
          <h1>Shop a catalogue rebuilt with the same earthy product-first UI as the reference site.</h1>
          <p>
            Shop page ab rounded filters, premium product cards, calm color palette, aur cleaner browsing hierarchy ke saath render hota hai.
          </p>
        </div>
        <div class="mwm-page-hero__media">
          <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXPowderSlide1.png?v=1773404065" alt="Shop hero product" />
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-shop-shell">
        <aside class="mwm-filter-panel">
          <div class="mwm-filter-block">
            <h3 class="mwm-filter-title">Categories</h3>
            <div id="shopCategoryFilters" class="mwm-filter-chips">
              <span class="mwm-filter-chip">Loading...</span>
            </div>
          </div>

          <div class="mwm-filter-block">
            <h3 class="mwm-filter-title">Brands</h3>
            <div id="shopBrandFilters" class="mwm-filter-chips">
              <span class="mwm-filter-chip">Loading...</span>
            </div>
          </div>

          <div class="mwm-filter-block mwm-filter-metrics">
            <div class="mwm-filter-metric">
              <strong id="shopMetricProducts">0</strong>
              <p>Products shown in current view.</p>
            </div>
            <div class="mwm-filter-metric">
              <strong id="shopMetricCategories">0</strong>
              <p>Categories available for discovery.</p>
            </div>
          </div>
        </aside>

        <div class="mwm-shop-main">
          <div class="mwm-shop-toolbar">
            <div>
              <span class="mwm-kicker" id="shopResultMeta">Loading catalogue</span>
              <h2 style="font-size: clamp(2.4rem, 4vw, 3.8rem);">Our product collection</h2>
            </div>

            <label>
              <span class="mwm-product-card__meta" style="display:block; margin-bottom: 8px;">Sort by</span>
              <select id="shopSort">
                <option value="featured">Featured</option>
                <option value="price_low">Price: Low to High</option>
                <option value="price_high">Price: High to Low</option>
                <option value="name">Name</option>
              </select>
            </label>
          </div>

          <div id="shopSelectedFilters" class="mwm-selected-filters"></div>
          <div id="shopProductGrid" class="mwm-product-grid">
            <div class="mwm-empty-state">Loading products...</div>
          </div>

          <div class="mwm-cta-panel">
            <span class="mwm-kicker">Need Help Choosing?</span>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem);">Use the new contact page for order help, trade enquiries, or brand support.</h2>
            <div class="mwm-hero__actions">
              <a href="{{ route('contact') }}" class="mwm-btn mwm-btn--primary">Contact Support</a>
              <a href="{{ route('about') }}" class="mwm-btn mwm-btn--secondary">Read Our Story</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', async function () {
      const categoryContainer = document.getElementById('shopCategoryFilters');
      const brandContainer = document.getElementById('shopBrandFilters');
      const productGrid = document.getElementById('shopProductGrid');
      const selectedFilters = document.getElementById('shopSelectedFilters');
      const resultMeta = document.getElementById('shopResultMeta');
      const metricProducts = document.getElementById('shopMetricProducts');
      const metricCategories = document.getElementById('shopMetricCategories');
      const sortSelect = document.getElementById('shopSort');
      const apiUrl = @json(url('/api/home'));
      const shopUrl = @json(route('shop'));
      const contactUrl = @json(route('contact'));
      const currencyFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        maximumFractionDigits: 0
      });

      const fallbackProducts = [
        { name: 'Mushroomex Weight Gainer', category: { name: 'Bestseller', slug: 'bestseller' }, brand: { name: 'Mushroomex', slug: 'mushroomex' }, price: 379, discount: 0, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/WhatsApp_Image_2026-02-21_at_11.51.50_AM.jpg?v=1771655525' },
        { name: 'ShilajitX Gold Resin', category: { name: 'Resin', slug: 'resin' }, brand: { name: 'ShilajitX', slug: 'shilajitx' }, price: 1849, discount: 404, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_Shilajit_Gold_jpg.jpg?v=1772541072' },
        { name: 'MENZ-X Capsule', category: { name: 'Capsules', slug: 'capsules' }, brand: { name: 'MENZ-X', slug: 'menz-x' }, price: 1750, discount: 350, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/MenXCapsuleSlide1.png?v=1773404187' },
        { name: 'LUCOX Capsule', category: { name: 'Wellness', slug: 'wellness' }, brand: { name: 'LUCOX', slug: 'lucox' }, price: 1499, discount: 180, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/LucoXSlide1.png?v=1773920411' },
        { name: 'KABZ-X Powder', category: { name: 'Digestive Care', slug: 'digestive-care' }, brand: { name: 'KABZ-X', slug: 'kabz-x' }, price: 699, discount: 90, image: 'https://cdn.shopify.com/s/files/1/0568/9986/2610/files/Front_Images_KabzX_jpg.jpg?v=1772541393' }
      ];

      const fallbackCategories = [
        { name: 'Bestseller', slug: 'bestseller' },
        { name: 'Resin', slug: 'resin' },
        { name: 'Capsules', slug: 'capsules' },
        { name: 'Digestive Care', slug: 'digestive-care' }
      ];

      const fallbackBrands = [
        { name: 'Mushroomex', slug: 'mushroomex' },
        { name: 'ShilajitX', slug: 'shilajitx' },
        { name: 'MENZ-X', slug: 'menz-x' },
        { name: 'LUCOX', slug: 'lucox' }
      ];

      const query = new URLSearchParams(window.location.search);
      const state = {
        category: query.get('category') || '',
        brand: query.get('brand') || '',
        sort: 'featured'
      };

      let categories = [];
      let brands = [];
      let products = [];

      function escapeHtml(value) {
        return String(value ?? '')
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#39;');
      }

      function buildUrl(nextState = {}) {
        const url = new URL(shopUrl, window.location.origin);
        const params = new URLSearchParams(window.location.search);

        Object.entries({
          category: state.category,
          brand: state.brand,
          ...nextState
        }).forEach(function ([key, value]) {
          if (value) {
            params.set(key, value);
          } else {
            params.delete(key);
          }
        });

        const queryString = params.toString();
        return `${url.pathname}${queryString ? `?${queryString}` : ''}`;
      }

      function salePrice(product) {
        const price = Number(product.price || 0);
        const discount = Number(product.discount || 0);
        return Math.max(price - discount, 0);
      }

      function getFilteredProducts() {
        return products.filter(function (product) {
          const categorySlug = product.category?.slug || '';
          const brandSlug = product.brand?.slug || '';

          if (state.category && state.category !== categorySlug) {
            return false;
          }

          if (state.brand && state.brand !== brandSlug) {
            return false;
          }

          return true;
        });
      }

      function sortProducts(items) {
        const sorted = [...items];

        switch (state.sort) {
          case 'price_low':
            sorted.sort(function (a, b) { return salePrice(a) - salePrice(b); });
            break;
          case 'price_high':
            sorted.sort(function (a, b) { return salePrice(b) - salePrice(a); });
            break;
          case 'name':
            sorted.sort(function (a, b) { return String(a.name || '').localeCompare(String(b.name || '')); });
            break;
          default:
            break;
        }

        return sorted;
      }

      function renderChips(container, items, key) {
        const current = state[key];
        const allLabel = key === 'category' ? 'All Categories' : 'All Brands';

        container.innerHTML = [
          `<a href="${buildUrl({ [key]: '' })}" class="mwm-filter-chip ${current ? '' : 'is-active'}">${allLabel}</a>`,
          ...items.map(function (item) {
            const slug = item.slug || '';
            return `<a href="${buildUrl({ [key]: slug })}" class="mwm-filter-chip ${current === slug ? 'is-active' : ''}">${escapeHtml(item.name)}</a>`;
          })
        ].join('');
      }

      function renderSelectedFilters() {
        const chips = [];

        if (state.category) {
          const item = categories.find(function (category) { return category.slug === state.category; });
          chips.push(`<a href="${buildUrl({ category: '' })}" class="mwm-filter-chip is-active">${escapeHtml(item?.name || state.category)} x</a>`);
        }

        if (state.brand) {
          const item = brands.find(function (brand) { return brand.slug === state.brand; });
          chips.push(`<a href="${buildUrl({ brand: '' })}" class="mwm-filter-chip is-active">${escapeHtml(item?.name || state.brand)} x</a>`);
        }

        selectedFilters.innerHTML = chips.join('');
      }

      function renderProducts(items) {
        if (!items.length) {
          productGrid.innerHTML = `
            <div class="mwm-empty-state">
              No products matched the current filters. You can reset filters or contact us for support.
              <div style="margin-top: 18px;">
                <a href="${shopUrl}" class="mwm-link-button">Reset catalogue</a>
                <a href="${contactUrl}" class="mwm-link-button" style="margin-left: 12px;">Contact support</a>
              </div>
            </div>
          `;
          return;
        }

        productGrid.innerHTML = items.map(function (product) {
          const price = Number(product.price || 0);
          const discount = Number(product.discount || 0);
          const finalPrice = salePrice(product);

          return `
            <article class="mwm-product-card">
              <div class="mwm-product-card__media">
                <img src="${escapeHtml(product.image)}" alt="${escapeHtml(product.name)}" />
              </div>
              <div class="mwm-product-card__body">
                <span class="mwm-product-card__meta">${escapeHtml(product.category?.name || 'Collection')} / ${escapeHtml(product.brand?.name || 'Brand')}</span>
                <h3>${escapeHtml(product.name)}</h3>
                <p>Rounded premium product framing that visually matches the rebuilt mushroom storefront.</p>
                <div class="mwm-product-card__price">
                  <strong>${currencyFormatter.format(finalPrice)}</strong>
                  ${discount > 0 ? `<del>${currencyFormatter.format(price)}</del>` : ''}
                </div>
                <a href="${contactUrl}" class="mwm-link-button">Order support</a>
              </div>
            </article>
          `;
        }).join('');
      }

      function refreshView() {
        const filtered = sortProducts(getFilteredProducts());
        resultMeta.textContent = `${filtered.length} products available`;
        metricProducts.textContent = String(filtered.length);
        metricCategories.textContent = String(categories.length);
        renderChips(categoryContainer, categories, 'category');
        renderChips(brandContainer, brands, 'brand');
        renderSelectedFilters();
        renderProducts(filtered);
      }

      sortSelect.addEventListener('change', function () {
        state.sort = sortSelect.value;
        refreshView();
      });

      try {
        const response = await fetch(apiUrl, {
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        if (!response.ok) {
          throw new Error(`Request failed with status ${response.status}`);
        }

        const payload = await response.json();
        categories = payload?.data?.categories?.length ? payload.data.categories : fallbackCategories;
        brands = payload?.data?.brands?.length ? payload.data.brands : fallbackBrands;
        products = payload?.data?.products?.length ? payload.data.products : fallbackProducts;
      } catch (error) {
        console.error('Unable to load shop data:', error);
        categories = fallbackCategories;
        brands = fallbackBrands;
        products = fallbackProducts;
      }

      refreshView();
    });
  </script>
@endpush
