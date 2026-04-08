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
      const homeApiUrl = @json(url('/api/home'));
      const productApiUrl = @json(url('/api/product'));
      const cartApiUrl = @json(url('/api/cart'));
      const shopUrl = @json(route('shop'));
      const cartUrl = @json(route('cart'));
      const contactUrl = @json(route('contact'));
      const productBaseUrl = @json(url('/product'));
      const loginUrl = @json(route('login'));
      const isGuest = @json(!auth()->check());
      
      const currencyFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        maximumFractionDigits: 0
      });


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
        Object.entries({ category: state.category, brand: state.brand, ...nextState }).forEach(function ([key, value]) {
          if (value) params.set(key, value); else params.delete(key);
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
          if (state.category && state.category !== categorySlug) return false;
          if (state.brand && state.brand !== brandSlug) return false;
          return true;
        });
      }

      function sortProducts(items) {
        const sorted = [...items];
        switch (state.sort) {
          case 'price_low': sorted.sort((a, b) => salePrice(a) - salePrice(b)); break;
          case 'price_high': sorted.sort((a, b) => salePrice(b) - salePrice(a)); break;
          case 'name': sorted.sort((a, b) => String(a.name || '').localeCompare(String(b.name || ''))); break;
          default: break;
        }
        return sorted;
      }

      function renderChips(container, items, key) {
        const current = state[key];
        const allLabel = key === 'category' ? 'All Categories' : 'All Brands';
        container.innerHTML = [
          `<a href="${buildUrl({ [key]: '' })}" class="mwm-filter-chip ${current ? '' : 'is-active'}">${allLabel}</a>`,
          ...items.map(item => {
            const slug = item.slug || '';
            return `<a href="${buildUrl({ [key]: slug })}" class="mwm-filter-chip ${current === slug ? 'is-active' : ''}">${escapeHtml(item.name)}</a>`;
          })
        ].join('');
      }

      function renderSelectedFilters() {
        const chips = [];
        if (state.category) {
          const item = categories.find(c => c.slug === state.category);
          chips.push(`<a href="${buildUrl({ category: '' })}" class="mwm-filter-chip is-active">${escapeHtml(item?.name || state.category)} x</a>`);
        }
        if (state.brand) {
          const item = brands.find(b => b.slug === state.brand);
          chips.push(`<a href="${buildUrl({ brand: '' })}" class="mwm-filter-chip is-active">${escapeHtml(item?.name || state.brand)} x</a>`);
        }
        selectedFilters.innerHTML = chips.join('');
      }

      async function addToCart(productId, btn) {
        if (isGuest) {
          window.location.href = loginUrl;
          return;
        }

        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = 'Adding...';

        try {
          const response = await fetch(cartApiUrl, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
          });

          const result = await response.json();
          if (response.ok) {
            btn.innerHTML = 'Added!';
            btn.classList.add('mwm-btn--accent');
            
            // Dispatch event to update header count
            window.dispatchEvent(new CustomEvent('cart:updated'));

            setTimeout(() => {
              btn.innerHTML = originalText;
              btn.disabled = false;
              btn.classList.remove('mwm-btn--accent');
            }, 2000);
          } else {
            alert(result.message || 'Failed to add to cart');
            btn.innerHTML = originalText;
            btn.disabled = false;
          }
        } catch (error) {
          console.error('Cart Error:', error);
          btn.innerHTML = originalText;
          btn.disabled = false;
        }
      }

      function renderProducts(items) {
        if (!items || !items.length) {
          productGrid.innerHTML = `<div class="mwm-empty-state">No products found for the current selection.</div>`;
          return;
        }

        productGrid.innerHTML = items.map(product => {
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
                <p>Curated wellness products for your nature-led health journey.</p>
                <div class="mwm-product-card__price">
                  <strong>${currencyFormatter.format(finalPrice)}</strong>
                  ${discount > 0 ? `<del>${currencyFormatter.format(price)}</del>` : ''}
                </div>
                <div style="display: flex; gap: 8px; margin-top: auto;">
                  ${product.is_added_in_cart ? `
                    <a href="${cartUrl}" class="mwm-btn mwm-btn--primary" style="flex: 1; min-height: 44px; font-size: 12px; display: flex; align-items: center; justify-content: center; background: var(--mwm-accent-dark); color: white; border: 0;">Go to Cart</a>
                  ` : `
                    <button class="mwm-btn mwm-btn--primary add-to-cart-btn" data-id="${product.id}" style="flex: 1; min-height: 44px; font-size: 12px;">Add to Cart</button>
                  `}
                  <a href="${productBaseUrl}/${escapeHtml(product.slug)}" class="mwm-btn mwm-btn--secondary" style="min-height: 44px; width: auto; padding: 0 14px; display: flex; align-items: center; justify-content: center;">
                    View
                  </a>
                </div>
              </div>
            </article>
          `;
        }).join('');

        document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
          btn.addEventListener('click', () => addToCart(btn.dataset.id, btn));
        });
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
        const response = await fetch(homeApiUrl);
        if (!response.ok) throw new Error(`Status ${response.status}`);
        const data = await response.json();
        const payload = data?.data || {};
        categories = payload.categories || [];
        brands = payload.brands || [];
        products = payload.products || [];
      } catch (error) {
        console.error('Data Error:', error);
        categories = [];
        brands = [];
        products = [];
      }

      refreshView();
    });
  </script>
@endpush
