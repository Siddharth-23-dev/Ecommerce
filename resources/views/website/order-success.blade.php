@extends('layouts.app')

@section('title', 'Order Success | My Mushroom World')

@section('content')
  <section class="mwm-section">
    <div class="container" style="text-align: center; padding: 100px 20px;">
      <div style="margin-bottom: 40px;">
        <div class="mwm-brand__seal" style="margin: 0 auto 30px; width: 100px; height: 100px; font-size: 40px;">MW</div>
        <span class="mwm-kicker">Order Placed Successfully</span>
        <h1 style="font-size: clamp(3rem, 8vw, 5rem);">Your wellness journey continues.</h1>
        <p style="max-width: 600px; margin: 20px auto; font-size: 18px;">
          Thank you for choosing My Mushroom World. We've received your order and are preparing your items with the utmost care.
        </p>
      </div>

      <div class="mwm-panel" style="max-width: 500px; margin: 0 auto; padding: 40px; border-radius: 40px;">
        <h3 style="margin-bottom: 15px;">What's next?</h3>
        <ul style="text-align: left; margin: 0 auto; display: grid; gap: 15px; color: var(--mwm-text-soft);">
          <li>1. You'll receive a confirmation email shortly.</li>
          <li>2. Our team will pack your premium selection.</li>
          <li>3. We'll notify you once your order is dispatched.</li>
        </ul>
        
        <div style="margin-top: 40px; display: grid; gap: 12px;">
          <a href="{{ route('home') }}" class="mwm-btn mwm-btn--primary">Return to Home</a>
          <a href="{{ route('shop') }}" class="mwm-btn mwm-btn--secondary">Explore More Products</a>
        </div>
      </div>
    </div>
  </section>
@endsection
