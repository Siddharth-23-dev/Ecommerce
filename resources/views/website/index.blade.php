@extends('layouts.app')

@section('content')
    @php($bannerCollection = $banners ?? collect())

    <section class="store-banner py-4">
        <div class="container">
            <div id="storeBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

                {{-- Slides --}}
                <div class="carousel-inner banner-carousel-inner" id="dynamic-banner-slides">
                    @forelse($bannerCollection as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img
                                class="d-block w-100 banner-img"
                                src="{{ $banner->image ? asset('uploads/banners/' . $banner->image) : asset('assets/website/images/home/demo3/slideshow-character1.png') }}"
                                alt="{{ $banner->title }}"
                            >
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img
                                class="d-block w-100 banner-img"
                                src="{{ asset('assets/website/images/home/demo3/slideshow-character1.png') }}"
                                alt="Default banner"
                            >
                        </div>
                    @endforelse
                </div>

                {{-- Dot Indicators --}}
                <div class="carousel-indicators banner-dots" id="dynamic-banner-indicators">
                    @forelse($bannerCollection as $banner)
                        <button
                            type="button"
                            data-bs-target="#storeBannerCarousel"
                            data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}"
                            aria-label="Slide {{ $loop->iteration }}"
                        ></button>
                    @empty
                        <button type="button" data-bs-target="#storeBannerCarousel" data-bs-slide-to="0" class="active"></button>
                    @endforelse
                </div>

                {{-- Prev Button --}}
                <button class="carousel-control-prev banner-control" type="button" data-bs-target="#storeBannerCarousel" data-bs-slide="prev">
                    <span class="banner-arrow">&#8592;</span>
                </button>

                {{-- Next Button --}}
                <button class="carousel-control-next banner-control" type="button" data-bs-target="#storeBannerCarousel" data-bs-slide="next">
                    <span class="banner-arrow">&#8594;</span>
                </button>

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

      <div class="category-grid" id="dynamic-category-grid">
        <div class="catalog-placeholder">
          Loading categories...
        </div>
      </div>
    </div>
  </section>

  <section class="store-section store-section--contrast">
    <div class="container">
      <div class="section-heading">
        <div>
          <span class="eyebrow">Shop by brand</span>
          <h2>Open a brand, reveal its categories, then drill into products</h2>
        </div>
        <a href="{{ route('shop') }}" class="section-link">Browse catalogue</a>
      </div>

      <div class="brand-showcase-grid" id="dynamic-brand-grid">
        <div class="catalog-placeholder">
          Loading brands, categories, and products...
        </div>
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

@push('styles')
  <style>
    .store-banner .carousel {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
    }

    .store-banner .carousel-item img {
      height: 520px;
      object-fit: cover;
    }

    .store-banner .carousel-control-prev,
    .store-banner .carousel-control-next {
      width: 64px;
    }

    .store-banner .carousel-control-prev-icon,
    .store-banner .carousel-control-next-icon {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.18);
      background-size: 42% 42%;
      backdrop-filter: blur(8px);
    }

    @media (max-width: 991.98px) {
      .store-banner .carousel-item img {
        height: 360px;
      }
    }

    @media (max-width: 575.98px) {
      .store-banner .carousel {
        border-radius: 20px;
      }

      .store-banner .carousel-item img {
        height: 260px;
      }

      .store-banner .carousel-control-prev,
      .store-banner .carousel-control-next {
        display: none;
      }
    }
  </style>
@endpush

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', async function() {
      const bannerIndicators = document.getElementById('dynamic-banner-indicators');
      const bannerSlides = document.getElementById('dynamic-banner-slides');
      const categoryGrid = document.getElementById('dynamic-category-grid');
      const brandGrid = document.getElementById('dynamic-brand-grid');

      const homeApiUrl = @json(url('/api/home'));
      const shopUrl = @json(route('shop'));
      const categoryAssetBase = @json(asset('uploads/categories'));
      const brandAssetBase = @json(asset('uploads/brands'));
      const productAssetBase = @json(asset('uploads/products'));
      const bannerAssetBase = @json(asset('uploads/banners'));
      const defaultCategoryImage = @json(asset('assets/website/images/home/demo3/category_1.png'));
      const defaultBrandImage = @json(asset('assets/website/images/home/demo3/category_2.png'));
      const defaultProductImage = @json(asset('assets/website/images/products/product_0.jpg'));
      const defaultBannerImage = @json(asset('assets/website/images/home/demo3/slideshow-character1.png'));
      const currencyFormatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
      });

      function escapeHtml(value) {
        return String(value ?? '')
          .replace(/&/g, '&amp;')
          .replace(/</g, '&lt;')
          .replace(/>/g, '&gt;')
          .replace(/"/g, '&quot;')
          .replace(/'/g, '&#39;');
      }

      function renderMessage(element, message, isError = false) {
        element.innerHTML = `<div class="catalog-placeholder${isError ? ' catalog-placeholder--error' : ''}">${escapeHtml(message)}</div>`;
      }

      function buildShopLink(params = {}) {
        const url = new URL(shopUrl, window.location.origin);

        Object.entries(params).forEach(([key, value]) => {
          if (value) {
            url.searchParams.set(key, value);
          }
        });

        return `${url.pathname}${url.search}`;
      }

      function resolveImage(image, fallbackImage, assetBase = '') {
        if (!image) {
          return fallbackImage;
        }

        if (/^https?:\/\//i.test(image)) {
          return image;
        }

        return assetBase ? `${assetBase}/${image}` : image;
      }

      async function fetchJson(url) {
        const response = await fetch(url, {
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        if (!response.ok) {
          throw new Error(`Request failed with status ${response.status}`);
        }

        return response.json();
      }

      function renderBanners(banners) {
        if (!Array.isArray(banners) || banners.length === 0) {
          bannerIndicators.innerHTML = `
            <button
              type="button"
              data-bs-target="#storeBannerCarousel"
              data-bs-slide-to="0"
              class="active"
              aria-label="Slide 1"
            ></button>
          `;

          bannerSlides.innerHTML = `
            <div class="carousel-item active">
              <img class="d-block w-100 banner-img" src="${defaultBannerImage}" alt="Default banner">
            </div>
          `;

          return;
        }

        bannerIndicators.innerHTML = banners.map((banner, index) => `
          <button
            type="button"
            data-bs-target="#storeBannerCarousel"
            data-bs-slide-to="${index}"
            class="${index === 0 ? 'active' : ''}"
            aria-label="Slide ${index + 1}"
          ></button>
        `).join('');

        bannerSlides.innerHTML = banners.map((banner, index) => `
          <div class="carousel-item ${index === 0 ? 'active' : ''}">
            <img
              class="d-block w-100 banner-img"
              src="${resolveImage(banner.image, defaultBannerImage, bannerAssetBase)}"
              alt="${escapeHtml(banner.title || 'Banner')}"
            >
          </div>
        `).join('');
      }

      function renderCategories(categories) {
        if (!Array.isArray(categories) || categories.length === 0) {
          renderMessage(categoryGrid, 'No categories found.');
          return;
        }

        categoryGrid.innerHTML = categories.map(category => {
          const categoryName = escapeHtml(category.name);
          const categoryImage = resolveImage(category.image, defaultCategoryImage, categoryAssetBase);
          const categoryLink = buildShopLink({ category: category.slug });

          return `
            <a href="${categoryLink}" class="category-card">
              <div class="category-card__media">
                <img src="${categoryImage}" alt="${categoryName}" />
              </div>
              <h3>${categoryName}</h3>
              <p>Explore ${categoryName}</p>
            </a>
          `;
        }).join('');
      }

      function renderProducts(products, brand, fallbackCategory) {
        if (!Array.isArray(products) || products.length === 0) {
          return '<div class="catalog-placeholder catalog-placeholder--inline">No products added under this category yet.</div>';
        }

        return products.map(product => {
          const productName = escapeHtml(product.name);
          const productCategoryName = escapeHtml(product.category?.name || fallbackCategory?.name || 'Catalogue product');
          const productImage = resolveImage(product.image, defaultProductImage, productAssetBase);
          const originalPrice = Number(product.price || 0);
          const discount = Number(product.discount || 0);
          const finalPrice = discount > 0 ? Math.max(originalPrice - discount, 0) : originalPrice;
          const productLink = buildShopLink({
            category: product.category?.slug || fallbackCategory?.slug || '',
            brand: brand.slug || ''
          });

          return `
            <a href="${productLink}" class="brand-product-card">
              <div class="brand-product-card__media">
                <img src="${productImage}" alt="${productName}" />
              </div>
              <div class="brand-product-card__body">
                <span class="brand-product-card__meta">${productCategoryName}</span>
                <h3>${productName}</h3>
                <div class="brand-product-card__price">
                  <strong>${currencyFormatter.format(finalPrice)}</strong>
                  ${discount > 0 ? `<del>${currencyFormatter.format(originalPrice)}</del>` : ''}
                </div>
                <span class="brand-product-card__link">View in shop</span>
              </div>
            </a>
          `;
        }).join('');
      }

      function mergeBrandsWithProducts(brands, products) {
        if (!Array.isArray(brands)) {
          return [];
        }

        const productsByBrand = Array.isArray(products)
          ? products.reduce((carry, product) => {
              const brandId = product?.brand_id;

              if (!brandId) {
                return carry;
              }

              if (!carry[brandId]) {
                carry[brandId] = [];
              }

              carry[brandId].push(product);
              return carry;
            }, {})
          : {};

        return brands.map(brand => ({
          ...brand,
          products: productsByBrand[brand.id] || []
        }));
      }

      function buildBrandCategories(brand) {
        const categoryMap = new Map();

        function getCategoryKey(category) {
          return category?.id || category?.slug || category?.name || null;
        }

        function ensureCategory(category) {
          if (!category) {
            return null;
          }

          const key = getCategoryKey(category);

          if (!key) {
            return null;
          }

          if (!categoryMap.has(key)) {
            categoryMap.set(key, {
              id: category.id || null,
              name: category.name || 'Untitled category',
              slug: category.slug || '',
              image: category.image || null,
              products: []
            });
          }

          return categoryMap.get(key);
        }

        ensureCategory(brand.category);

        (brand.products || []).forEach(product => {
          const categoryBucket = ensureCategory(product.category || brand.category);

          if (categoryBucket) {
            categoryBucket.products.push(product);
          }
        });

        return Array.from(categoryMap.values());
      }

      function renderCategoryItems(categories, brand) {
        if (!categories.length) {
          return `
            <div class="brand-panel__empty">
              <strong>No categories yet</strong>
              <p>This brand is added in backend, but no category or product is linked yet.</p>
            </div>
          `;
        }

        return categories.map((category, index) => {
          const categoryName = escapeHtml(category.name);
          const categoryImage = resolveImage(category.image, defaultCategoryImage, categoryAssetBase);
          const categoryPanelId = `brand-${brand.id}-category-${category.id || index}`;
          const productCount = Array.isArray(category.products) ? category.products.length : 0;

          return `
            <div class="brand-category-item" data-category-item>
              <button
                type="button"
                class="brand-category-trigger"
                data-category-trigger
                aria-expanded="false"
                aria-controls="${categoryPanelId}"
              >
                <span class="brand-category-trigger__media">
                  <img src="${categoryImage}" alt="${categoryName}" />
                </span>
                <span class="brand-category-trigger__content">
                  <span>Category</span>
                  <strong>${categoryName}</strong>
                  <small>${productCount > 0 ? `${productCount} product${productCount > 1 ? 's' : ''}` : 'Products not added yet'}</small>
                </span>
                <span class="brand-category-trigger__icon" aria-hidden="true"></span>
              </button>

              <div id="${categoryPanelId}" class="brand-category-panel" hidden>
                ${productCount > 0
                  ? `<div class="brand-product-grid">${renderProducts(category.products, brand, category)}</div>`
                  : '<div class="brand-panel__empty brand-panel__empty--compact"><strong>No products yet</strong><p>Category is available, but products are not added under it yet.</p></div>'
                }
              </div>
            </div>
          `;
        }).join('');
      }

      function renderBrands(brands) {
        if (!Array.isArray(brands) || brands.length === 0) {
          renderMessage(brandGrid, 'No brands found.');
          return;
        }

        brandGrid.innerHTML = brands.map(brand => {
          const brandName = escapeHtml(brand.name);
          const brandImage = resolveImage(brand.image, defaultBrandImage, brandAssetBase);
          const categories = buildBrandCategories(brand);
          const panelId = `brand-panel-${brand.id}`;
          const categoryCount = categories.length;
          const productCount = Array.isArray(brand.products) ? brand.products.length : 0;

          return `
            <article class="brand-accordion__item" data-brand-item>
              <button
                type="button"
                class="brand-trigger"
                data-brand-trigger
                aria-expanded="false"
                aria-controls="${panelId}"
              >
                <span class="brand-trigger__identity">
                  <span class="brand-trigger__media">
                    <img src="${brandImage}" alt="${brandName}" />
                  </span>
                  <span class="brand-trigger__content">
                    <span>Brand</span>
                    <strong>${brandName}</strong>
                    <small>${categoryCount > 0 ? `${categoryCount} categor${categoryCount > 1 ? 'ies' : 'y'}` : 'No category linked yet'}${productCount > 0 ? ` • ${productCount} product${productCount > 1 ? 's' : ''}` : ''}</small>
                  </span>
                </span>
                <span class="brand-trigger__icon" aria-hidden="true"></span>
              </button>

              <div id="${panelId}" class="brand-panel" hidden>
                <div class="brand-category-list">
                  ${renderCategoryItems(categories, brand)}
                </div>
              </div>
            </article>
          `;
        }).join('');
      }

      brandGrid.addEventListener('click', event => {
        const categoryTrigger = event.target.closest('[data-category-trigger]');

        if (categoryTrigger) {
          const categoryItem = categoryTrigger.closest('[data-category-item]');
          const brandItem = categoryTrigger.closest('[data-brand-item]');
          const panel = categoryItem?.querySelector('.brand-category-panel');
          const isExpanded = categoryTrigger.getAttribute('aria-expanded') === 'true';

          brandItem?.querySelectorAll('[data-category-trigger]').forEach(trigger => {
            if (trigger !== categoryTrigger) {
              trigger.setAttribute('aria-expanded', 'false');
              trigger.closest('[data-category-item]')?.classList.remove('is-open');
            }
          });

          brandItem?.querySelectorAll('.brand-category-panel').forEach(categoryPanel => {
            if (categoryPanel !== panel) {
              categoryPanel.hidden = true;
            }
          });

          if (panel) {
            panel.hidden = isExpanded;
          }

          categoryTrigger.setAttribute('aria-expanded', String(!isExpanded));
          categoryItem?.classList.toggle('is-open', !isExpanded);
          return;
        }

        const brandTrigger = event.target.closest('[data-brand-trigger]');

        if (!brandTrigger) {
          return;
        }

        const brandItem = brandTrigger.closest('[data-brand-item]');
        const panel = brandItem?.querySelector('.brand-panel');
        const isExpanded = brandTrigger.getAttribute('aria-expanded') === 'true';

        brandGrid.querySelectorAll('[data-brand-trigger]').forEach(trigger => {
          if (trigger !== brandTrigger) {
            trigger.setAttribute('aria-expanded', 'false');
            trigger.closest('[data-brand-item]')?.classList.remove('is-open');
          }
        });

        brandGrid.querySelectorAll('.brand-panel').forEach(brandPanel => {
          if (brandPanel !== panel) {
            brandPanel.hidden = true;
          }
        });

        brandGrid.querySelectorAll('[data-category-trigger]').forEach(trigger => {
          if (!brandItem?.contains(trigger)) {
            trigger.setAttribute('aria-expanded', 'false');
            trigger.closest('[data-category-item]')?.classList.remove('is-open');
          }
        });

        brandGrid.querySelectorAll('.brand-category-panel').forEach(categoryPanel => {
          if (!brandItem?.contains(categoryPanel)) {
            categoryPanel.hidden = true;
          }
        });

        if (panel) {
          panel.hidden = isExpanded;
        }

        if (isExpanded) {
          brandItem?.querySelectorAll('[data-category-trigger]').forEach(trigger => {
            trigger.setAttribute('aria-expanded', 'false');
            trigger.closest('[data-category-item]')?.classList.remove('is-open');
          });

          brandItem?.querySelectorAll('.brand-category-panel').forEach(categoryPanel => {
            categoryPanel.hidden = true;
          });
        }

        brandTrigger.setAttribute('aria-expanded', String(!isExpanded));
        brandItem?.classList.toggle('is-open', !isExpanded);
      });

      try {
        const response = await fetchJson(homeApiUrl);
        const homeData = response?.data || {};
        const brandsWithProducts = mergeBrandsWithProducts(homeData.brands || [], homeData.products || []);

        renderBanners(homeData.banners || []);
        renderCategories(homeData.categories || []);
        renderBrands(brandsWithProducts);
      } catch (error) {
        console.error('Error fetching home data:', error);
        renderBanners([]);
        renderMessage(categoryGrid, 'Failed to load categories. Please try again later.', true);
        renderMessage(brandGrid, 'Failed to load brands and products. Please try again later.', true);
      }
    });
  </script>
@endpush
