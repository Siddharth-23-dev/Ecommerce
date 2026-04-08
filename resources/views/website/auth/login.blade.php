@extends('layouts.app')

@section('title', 'My Mushroom World | Login')

@section('content')
  <section class="mwm-section">
    <div class="container" style="max-width: 600px;">
      <div class="mwm-panel" style="padding: clamp(30px, 5vw, 60px); border-radius: 40px;">
        <div style="text-align: center; margin-bottom: 40px;">
          <span class="mwm-kicker">Welcome Back</span>
          <h1 style="font-size: clamp(2.4rem, 5vw, 3.8rem);">Account Login</h1>
          <p>Login to manage your wellness orders and preferences.</p>
        </div>

        <div id="errorBox" class="mwm-badge" style="display: none; background: #fee2e2; color: #991b1b; width: 100%; border-radius: 12px; padding: 12px; margin-bottom: 24px; text-align: center; font-weight: 800;"></div>

        <form id="loginForm" class="mwm-contact-stack" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mwm-form-group">
            <label class="mwm-form-label">Email Address</label>
            <input id="email" name="email" type="email" class="mwm-form-input" placeholder="nature@wellness.com" value="{{ old('email') }}" required>
            @error('email')
              <span style="color: #cc0000; font-size: 12px; font-weight: 800;">{{ $message }}</span>
            @enderror
          </div>

          <div class="mwm-form-group">
            <label class="mwm-form-label">Password</label>
            <input id="password" name="password" type="password" class="mwm-form-input" placeholder="••••••••" required>
            @error('password')
              <span style="color: #cc0000; font-size: 12px; font-weight: 800;">{{ $message }}</span>
            @enderror
          </div>

          <div style="margin-top: 20px; display: grid; gap: 16px;">
            <button type="submit" class="mwm-btn mwm-btn--primary" style="width: 100%;">Sign In</button>
            <div style="text-align: center;">
              <p style="font-size: 14px; color: var(--mwm-text-soft);">Don't have an account? <a href="{{ route('register') }}" style="color: var(--mwm-accent-dark); font-weight: 800; text-decoration: underline;">Create one here</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
