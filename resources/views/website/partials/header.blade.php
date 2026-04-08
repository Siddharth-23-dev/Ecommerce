<div class="mwm-topline">
  <div class="container mwm-topline__inner">
    <span>Nature's Finest, Crafted for You</span>
    <span>Ayurvedic inspired wellness storefront</span>
  </div>
</div>

<header class="mwm-header">
  <div class="container">
    <div class="mwm-header__shell">
      <a href="{{ route('home') }}" class="mwm-brand" aria-label="My Mushroom World home">
        <span class="mwm-brand__seal">MW</span>
        <span class="mwm-brand__text">
          <span class="mwm-brand__eyebrow">Power Of Mushrooms</span>
          <span class="mwm-brand__title">My Mushroom World</span>
        </span>
      </a>

      <nav class="mwm-nav" aria-label="Primary navigation">
        <a href="{{ route('home') }}" class="mwm-nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
        <a href="{{ route('shop') }}" class="mwm-nav__link {{ request()->routeIs('shop') ? 'is-active' : '' }}">Shop</a>
        <a href="{{ route('about') }}" class="mwm-nav__link {{ request()->routeIs('about') ? 'is-active' : '' }}">About Us</a>
        <a href="{{ route('contact') }}" class="mwm-nav__link {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact Us</a>
      </nav>

      <div class="mwm-header__actions">
        <a href="{{ route('cart') }}" class="mwm-header__action" style="position: relative; display: flex; align-items: center; gap: 8px;">
          Cart
          <span id="cartCountBadge" class="mwm-badge" style="display: none; background: var(--mwm-accent); color: white; border-radius: 99px; min-width: 20px; height: 20px; font-size: 11px; padding: 0 6px; align-items: center; justify-content: center; font-weight: 800;">0</span>
        </a>

        @guest
          <a href="{{ route('login') }}" class="mwm-header__action">Login</a>
          <a href="{{ route('register') }}" class="mwm-header__action mwm-header__action--accent">Sign Up</a>
        @else
          @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="mwm-header__action">Admin</a>
          @else
            <a href="{{ route('user.dashboard') }}" class="mwm-header__action">Dashboard</a>
          @endif

          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="mwm-header__action">Logout</button>
          </form>
        @endguest
      </div>

      <button
        type="button"
        class="mwm-menu-toggle"
        data-menu-toggle
        data-target="#mobileMenu"
        aria-expanded="false"
        aria-controls="mobileMenu"
        aria-label="Toggle menu"
      >
        <span></span>
      </button>
    </div>

    <nav id="mobileMenu" class="mwm-mobile-nav" aria-label="Mobile navigation">
      <a href="{{ route('home') }}" class="mwm-mobile-nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
      <a href="{{ route('shop') }}" class="mwm-mobile-nav__link {{ request()->routeIs('shop') ? 'is-active' : '' }}">Shop</a>
      <a href="{{ route('about') }}" class="mwm-mobile-nav__link {{ request()->routeIs('about') ? 'is-active' : '' }}">About Us</a>
      <a href="{{ route('contact') }}" class="mwm-mobile-nav__link {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact Us</a>
      <a href="{{ route('cart') }}" class="mwm-mobile-nav__link" style="display: flex; align-items: center; justify-content: space-between;">
        <span>Cart</span>
        <span id="mobileCartCountBadge" class="mwm-badge" style="display: none; background: var(--mwm-accent); color: white; border-radius: 99px; min-width: 24px; height: 24px; font-size: 12px; padding: 0 8px; align-items: center; justify-content: center; font-weight: 800;">0</span>
      </a>

      @guest
        <a href="{{ route('login') }}" class="mwm-mobile-nav__link">Login</a>
        <a href="{{ route('register') }}" class="mwm-mobile-nav__link">Sign Up</a>
      @else
        @if(Auth::user()->isAdmin())
          <a href="{{ route('admin.dashboard') }}" class="mwm-mobile-nav__link">Admin</a>
        @else
          <a href="{{ route('user.dashboard') }}" class="mwm-mobile-nav__link">Dashboard</a>
        @endif

        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="mwm-mobile-nav__link">Logout</button>
        </form>
      @endguest
    </nav>
  </div>
</header>

<script>
  (function() {
    async function updateGlobalCartCount() {
      const desktopBadge = document.getElementById('cartCountBadge');
      const mobileBadge = document.getElementById('mobileCartCountBadge');
      const countUrl = @json(url('/api/cart/count'));
      
      try {
        const response = await fetch(countUrl, {
          headers: { 'Accept': 'application/json' }
        });
        const result = await response.json();
        
        if (response.ok && result.count > 0) {
          if (desktopBadge) {
            desktopBadge.innerText = result.count;
            desktopBadge.style.display = 'inline-flex';
          }
          if (mobileBadge) {
            mobileBadge.innerText = result.count;
            mobileBadge.style.display = 'inline-flex';
          }
        } else {
          if (desktopBadge) desktopBadge.style.display = 'none';
          if (mobileBadge) mobileBadge.style.display = 'none';
        }
      } catch (e) {
        // Silently fail if not logged in or error
      }
    }

    // Listen for custom event to refresh count
    window.addEventListener('cart:updated', updateGlobalCartCount);

    document.addEventListener('DOMContentLoaded', updateGlobalCartCount);
  })();
</script>
