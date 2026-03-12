<header class="store-header">
  <div class="announcement-bar">
    <div class="container store-header__announce">
      <span>Free shipping on orders over $99</span>
      <span>New season arrivals now live</span>
    </div>
  </div>

  <div class="container">
    <div class="store-header__main">
      <a href="{{ route('home') }}" class="store-header__brand" aria-label="Surfside home">
        <img src="{{ asset('assets/website/images/logo.png') }}" alt="Surfside" class="store-header__logo" />
      </a>

      <nav class="store-header__nav" aria-label="Primary navigation">
        <a href="{{ route('home') }}" class="store-header__link">Home</a>
        <a href="{{ route('shop') }}" class="store-header__link">Shop</a>
        <a href="{{ route('cart') }}" class="store-header__link">Cart</a>
        <a href="{{ route('about') }}" class="store-header__link">About</a>
        <a href="{{ route('contact') }}" class="store-header__link">Contact</a>
      </nav>

      <div class="store-header__actions">
        <a href="{{ route('shop') }}" class="store-header__icon" aria-label="Search products">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_search" />
          </svg>
        </a>
        <a href="{{ route('cart') }}" class="store-header__icon" aria-label="Wishlist">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_heart" />
          </svg>
        </a>
        <a href="{{ route('cart') }}" class="store-header__icon store-header__cart" aria-label="Cart">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_cart" />
          </svg>
          <span class="store-header__badge">3</span>
        </a>
      </div>
    </div>

    <div class="store-header__mobile">
      <a href="{{ route('home') }}" class="store-header__brand" aria-label="Surfside home">
        <img src="{{ asset('assets/website/images/logo.png') }}" alt="Surfside" class="store-header__logo" />
      </a>
      <div class="store-header__mobile-actions">
        <a href="{{ route('shop') }}" class="store-header__icon" aria-label="Shop">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_search" />
          </svg>
        </a>
        <a href="{{ route('cart') }}" class="store-header__icon store-header__cart" aria-label="Cart">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_cart" />
          </svg>
          <span class="store-header__badge">3</span>
        </a>
      </div>
    </div>

    <nav class="store-header__mobile-nav" aria-label="Mobile navigation">
      <a href="{{ route('home') }}" class="store-header__mobile-link">Home</a>
      <a href="{{ route('shop') }}" class="store-header__mobile-link">Shop</a>
      <a href="{{ route('cart') }}" class="store-header__mobile-link">Cart</a>
      <a href="{{ route('about') }}" class="store-header__mobile-link">About</a>
      <a href="{{ route('contact') }}" class="store-header__mobile-link">Contact</a>
    </nav>
  </div>
</header>
