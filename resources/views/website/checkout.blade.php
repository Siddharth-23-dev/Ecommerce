@extends('layouts.app')

@section('title', 'My Mushroom World | Checkout')

@section('content')
  <section class="mwm-section">
    <div class="container">
      <div class="mwm-page-hero">
        <div class="mwm-page-hero__copy">
          <span class="mwm-kicker">Checkout</span>
          <h1>Finalize your wellness order.</h1>
          <p>Please provide your shipping details to complete the purchase.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <form id="checkoutForm" class="mwm-shop-shell">
        <div class="mwm-shop-main" style="grid-column: 1 / -1; display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start;">
          
          <div class="mwm-contact-stack">
            <h3 class="mwm-filter-title">Shipping Address</h3>
            <div class="mwm-panel" style="padding: 30px; border-radius: 24px;">
              <div class="mwm-form-group">
                <label class="mwm-form-label">Phone Number</label>
                <input type="text" name="phone" class="mwm-form-input" placeholder="e.g. +91 9876543210" required>
              </div>
              <div class="mwm-form-group">
                <label class="mwm-form-label">Full Address</label>
                <textarea name="address" class="mwm-form-input" style="min-height: 100px;" placeholder="House No, Street, Landmark..." required></textarea>
              </div>
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="mwm-form-group">
                  <label class="mwm-form-label">City</label>
                  <input type="text" name="city" class="mwm-form-input" placeholder="City" required>
                </div>
                <div class="mwm-form-group">
                  <label class="mwm-form-label">State</label>
                  <input type="text" name="state" class="mwm-form-input" placeholder="State" required>
                </div>
              </div>
              <div class="mwm-form-group">
                <label class="mwm-form-label">Pincode</label>
                <input type="text" name="zip_code" class="mwm-form-input" placeholder="6-digit Pincode" required>
              </div>
            </div>

            <h3 class="mwm-filter-title" style="margin-top: 40px;">Payment Method</h3>
            <div class="mwm-panel" style="padding: 20px; border-radius: 24px; display: flex; align-items: center; gap: 15px;">
              <input type="radio" checked style="width: 20px; height: 20px; accent-color: var(--mwm-accent);">
              <div>
                <strong style="display: block;">Cash on Delivery (COD)</strong>
                <span style="font-size: 13px; color: var(--mwm-text-soft);">Pay securely when your package arrives.</span>
              </div>
            </div>
          </div>

          <aside class="mwm-filter-panel" style="position: sticky; top: 110px;">
            <h3 class="mwm-filter-title">Order Summary</h3>
            <div id="checkoutSummaryList" style="margin-bottom: 20px; display: grid; gap: 15px;">
              <!-- Items injected here -->
            </div>
            
            <div class="mwm-filter-block">
              <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                <span>Subtotal</span>
                <strong id="summarySubtotal">INR 0</strong>
              </div>
              <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                <span>Shipping</span>
                <strong class="mwm-badge" style="background: var(--mwm-accent); color: white;">Free</strong>
              </div>
              <div style="display: flex; justify-content: space-between; padding-top: 18px; border-top: 1px solid var(--mwm-border);">
                <span style="font-weight: 800; font-size: 18px;">Total</span>
                <strong id="summaryTotal" style="font-size: 24px; color: var(--mwm-accent-dark);">INR 0</strong>
              </div>
            </div>
            
            <button type="submit" id="placeOrderBtn" class="mwm-btn mwm-btn--primary" style="width: 100%; margin-top: 24px;">Place Order</button>
          </aside>

        </div>
      </form>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const summaryList = document.getElementById('checkoutSummaryList');
      const summarySubtotal = document.getElementById('summarySubtotal');
      const summaryTotal = document.getElementById('summaryTotal');
      const checkoutForm = document.getElementById('checkoutForm');
      const placeOrderBtn = document.getElementById('placeOrderBtn');
      const token = localStorage.getItem('api_token');
      
      const currencyFormatter = new Intl.NumberFormat('en-IN', {
        style: 'currency', currency: 'INR', maximumFractionDigits: 0
      });

      async function fetchCartSummary() {
        try {
          const headers = { 
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
          };
          if (token) headers['Authorization'] = `Bearer ${token}`;

          const response = await fetch('/api/cart', { headers });
          const result = await response.json();
          if (response.ok && result.data?.length) {
            renderSummary(result.data);
          } else {
            window.location.href = "{{ route('cart') }}";
          }
        } catch (error) { console.error(error); }
      }

      function renderSummary(items) {
        let subtotal = 0;
        summaryList.innerHTML = items.map(item => {
          const price = parseFloat(item.product.price) - parseFloat(item.product.discount || 0);
          subtotal += (price * item.quantity);
          return `
            <div style="display: flex; justify-content: space-between; font-size: 14px;">
              <span>${item.product.name} (x${item.quantity})</span>
              <strong>${currencyFormatter.format(price * item.quantity)}</strong>
            </div>
          `;
        }).join('');
        summarySubtotal.innerText = currencyFormatter.format(subtotal);
        summaryTotal.innerText = currencyFormatter.format(subtotal);
      }

      checkoutForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        placeOrderBtn.disabled = true;
        placeOrderBtn.innerHTML = 'Placing Order...';

        const formData = new FormData(checkoutForm);
        const data = Object.fromEntries(formData.entries());

        try {
          const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
            'X-Requested-With': 'XMLHttpRequest'
          };
          if (token) headers['Authorization'] = `Bearer ${token}`;

          const response = await fetch('/api/orders', {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(data)
          });

          const result = await response.json();
          if (response.ok) {
            window.location.href = "{{ route('order-success') }}";
          } else {
            alert(result.message || 'Checkout failed. Please check your details.');
            placeOrderBtn.disabled = false;
            placeOrderBtn.innerHTML = 'Place Order';
          }
        } catch (error) {
          console.error(error);
          alert('An error occurred. Please try again.');
          placeOrderBtn.disabled = false;
          placeOrderBtn.innerHTML = 'Place Order';
        }
      });

      fetchCartSummary();
    });
  </script>
@endpush
