<footer class="store-footer">
  <div class="container">
    <div class="store-footer__top">
      <div>
        <a href="{{ route('home') }}" class="store-footer__brand">
          <img src="{{ asset('assets/website/images/logo.png') }}" alt="Surfside" class="store-footer__logo" />
        </a>
        <p class="store-footer__text">
          Modern fashion essentials with premium fits, sharp pricing, and fast doorstep delivery.
        </p>
      </div>

      <div>
        <h4 class="store-footer__heading">Shop</h4>
        <ul class="store-footer__list">
          <li><a href="{{ route('shop') }}">New arrivals</a></li>
          <li><a href="{{ route('shop') }}">Best sellers</a></li>
          <li><a href="{{ route('shop') }}">Women</a></li>
          <li><a href="{{ route('shop') }}">Men</a></li>
        </ul>
      </div>

      <div>
        <h4 class="store-footer__heading">Company</h4>
        <ul class="store-footer__list">
          <li><a href="{{ route('about') }}">About us</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          <li><a href="{{ route('cart') }}">Shipping</a></li>
          <li><a href="{{ route('cart') }}">Returns</a></li>
        </ul>
      </div>

      <div>
        <h4 class="store-footer__heading">Newsletter</h4>
        <p class="store-footer__text">Get product drops, sale alerts, and weekly style picks.</p>
        <form class="store-footer__form">
          <input type="email" placeholder="Enter your email" aria-label="Email address" />
          <button type="submit">Join</button>
        </form>
      </div>
    </div>

    <div class="store-footer__bottom">
      <span>© 2026 Surfside Commerce</span>
      <span>Secure checkout. Curated collections. Fast delivery.</span>
    </div>
  </div>
</footer>
