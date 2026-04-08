@extends('layouts.app')

@section('title', 'My Mushroom World | Cart')

@section('content')
  <section class="mwm-section">
    <div class="container">
      <div class="mwm-page-hero">
        <div class="mwm-page-hero__copy">
          <span class="mwm-kicker">Your Cart</span>
          <h1>Review your wellness essentials before we prepare your delivery.</h1>
          <p>
            Experience a seamless, premium checkout flow designed to feel as natural as our ingredients.
          </p>
        </div>
        <div class="mwm-page-hero__media">
          <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/LucoXSlide1.png?v=1773920411" alt="Cart hero" />
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-shop-shell">
        <div class="mwm-shop-main" style="grid-column: 1 / -1; display: grid; grid-template-columns: 1fr 340px; gap: 28px; align-items: start;">
          
          <!-- CART ITEMS -->
          <div id="cartItemsList" class="mwm-contact-stack">
            <div class="mwm-empty-state">Loading your cart...</div>
          </div>

          <!-- SUMMARY -->
          <aside class="mwm-filter-panel" style="position: sticky; top: 110px;">
            <h3 class="mwm-filter-title">Summary</h3>
            <div class="mwm-filter-block">
              <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                <span>Subtotal</span>
                <strong id="cartSubtotal">INR 0</strong>
              </div>
              <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                <span>Shipping</span>
                <strong class="mwm-badge" style="background: var(--mwm-accent); color: white;">Free</strong>
              </div>
              <div style="display: flex; justify-content: space-between; padding-top: 18px; border-top: 1px solid var(--mwm-border);">
                <span style="font-weight: 800; font-size: 18px;">Total</span>
                <strong id="cartTotal" style="font-size: 24px; color: var(--mwm-accent-dark);">INR 0</strong>
              </div>
            </div>
            
            <div style="margin-top: 24px; display: grid; gap: 12px;">
              <a href="{{ route('checkout') }}" id="checkoutBtn" class="mwm-btn mwm-btn--primary" style="width: 100%;">Proceed to Checkout</a>
              <a href="{{ route('shop') }}" class="mwm-btn mwm-btn--secondary" style="width: 100%;">Continue Shopping</a>
            </div>
          </aside>

        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const cartItemsList = document.getElementById('cartItemsList');
      const cartSubtotal = document.getElementById('cartSubtotal');
      const cartTotal = document.getElementById('cartTotal');
      const checkoutBtn = document.getElementById('checkoutBtn');
      const cartApiUrl = @json(url('/api/cart'));
      
      const currencyFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        maximumFractionDigits: 0
      });

      // We assume the token is stored in localStorage after login
      const token = localStorage.getItem('api_token');

      async function fetchCart() {
        const headers = {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        };

        if (token) {
          headers['Authorization'] = `Bearer ${token}`;
        }

        try {
          const response = await fetch(cartApiUrl, { headers });

          const result = await response.json();
          if (response.ok) {
            renderCart(result.data || []);
          } else {
            throw new Error(result.message || 'Failed to fetch cart');
          }
        } catch (error) {
          console.error('Fetch Error:', error);
          cartItemsList.innerHTML = `<div class="mwm-empty-state">Error loading cart. Please try again.</div>`;
        }
      }

      function renderCart(items) {
        if (!items.length) {
          cartItemsList.innerHTML = `<div class="mwm-empty-state">Your cart is currently empty.</div>`;
          cartSubtotal.innerText = currencyFormatter.format(0);
          cartTotal.innerText = currencyFormatter.format(0);
          checkoutBtn.classList.add('disabled');
          checkoutBtn.style.pointerEvents = 'none';
          checkoutBtn.style.opacity = '0.5';
          return;
        }

        let subtotal = 0;
        cartItemsList.innerHTML = items.map(item => {
          const product = item.product;
          const price = parseFloat(product.price);
          const discount = parseFloat(product.discount || 0);
          const finalPrice = Math.max(price - discount, 0);
          const itemTotal = finalPrice * item.quantity;
          subtotal += itemTotal;

          return `
            <article class="mwm-panel" style="padding: 18px; display: grid; grid-template-columns: 100px 1fr auto; gap: 20px; align-items: center;">
              <div style="width: 100px; height: 100px; border-radius: 18px; overflow: hidden; background: #fff;">
                <img src="${product.image ? '/uploads/products/' + product.image : '/assets/images/placeholder.png'}" 
                     alt="${product.name}" 
                     style="width: 100%; height: 100%; object-fit: cover;" />
              </div>
              <div>
                <span class="mwm-product-card__meta">${escapeHtml(product.category?.name || 'Wellness')}</span>
                <h3 style="font-size: 24px; margin: 4px 0;">${escapeHtml(product.name)}</h3>
                <div class="mwm-product-card__price">
                  <strong>${currencyFormatter.format(finalPrice)}</strong>
                  ${discount > 0 ? `<del>${currencyFormatter.format(price)}</del>` : ''}
                </div>
              </div>
              <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 12px;">
                <div style="display: flex; align-items: center; gap: 10px; background: rgba(0,0,0,0.05); padding: 5px; border-radius: 99px;">
                  <button class="qty-btn" onclick="updateQty(${item.id}, ${item.quantity - 1})" 
                          style="width: 32px; height: 32px; border-radius: 50%; border: 0; cursor: pointer;">-</button>
                  <span style="font-weight: 800; min-width: 20px; text-align: center;">${item.quantity}</span>
                  <button class="qty-btn" onclick="updateQty(${item.id}, ${item.quantity + 1})" 
                          style="width: 32px; height: 32px; border-radius: 50%; border: 0; cursor: pointer;">+</button>
                </div>
                <button onclick="removeItem(${item.id})" style="border: 0; background: none; color: #cc0000; font-size: 13px; font-weight: 800; cursor: pointer; text-transform: uppercase; letter-spacing: 0.1em;">Remove</button>
              </div>
            </article>
          `;
        }).join('');

        cartSubtotal.innerText = currencyFormatter.format(subtotal);
        cartTotal.innerText = currencyFormatter.format(subtotal);
        checkoutBtn.classList.remove('disabled');
        checkoutBtn.style.pointerEvents = 'auto';
        checkoutBtn.style.opacity = '1';
      }

      window.updateQty = async function(id, newQty) {
        if (newQty < 1) return;
        const headers = {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        };
        if (token) headers['Authorization'] = `Bearer ${token}`;

        try {
          const response = await fetch(`${cartApiUrl}/${id}`, {
            method: 'PATCH',
            headers,
            body: JSON.stringify({ quantity: newQty })
          });
          if (response.ok) {
            fetchCart();
            window.dispatchEvent(new CustomEvent('cart:updated'));
          }
        } catch (error) { console.error('Update Error:', error); }
      };

      window.removeItem = async function(id) {
        if (!confirm('Remove this item?')) return;
        const headers = {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        };
        if (token) headers['Authorization'] = `Bearer ${token}`;

        try {
          const response = await fetch(`${cartApiUrl}/${id}`, {
            method: 'DELETE',
            headers
          });
          if (response.ok) {
            fetchCart();
            window.dispatchEvent(new CustomEvent('cart:updated'));
          }
        } catch (error) { console.error('Remove Error:', error); }
      };

      function escapeHtml(value) {
        return String(value ?? '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
      }

      fetchCart();
    });
  </script>
@endpush
