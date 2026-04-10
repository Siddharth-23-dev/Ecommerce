

<header class="w-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm w-100 m-0 p-0 border-0">
        <div class="container-fluid px-4 py-3">

            <!-- Brand -->
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center gap-3 m-0">
                <div class="bg-success text-white fw-bold d-flex justify-content-center align-items-center"
                     style="width:55px; height:55px; font-size:20px;">
                    MW
                </div>
                <div>
                    <small class="text-muted d-block" style="font-size:12px;">Power Of Mushrooms</small>
                    <span class="fw-bold fs-5 text-dark">My Mushroom World</span>
                </div>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse justify-content-between" id="mainNavbar">

                <!-- Menu -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold text-success' : '' }}"
                           href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('shop') ? 'active fw-bold text-success' : '' }}"
                           href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active fw-bold text-success' : '' }}"
                           href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-bold text-success' : '' }}"
                           href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>

                <!-- Right Actions -->
                <div class="d-flex align-items-center gap-3">

                    <!-- Cart -->
                    <a href="{{ route('cart') }}" class="btn btn-outline-success position-relative rounded-0">
                        Cart
                        <span id="cartCountBadge"
                              class="position-absolute top-0 start-100 translate-middle badge bg-danger d-none rounded-pill">
                            0
                        </span>
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-0">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-success rounded-0">Sign Up</a>
                    @else
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary rounded-0">Admin</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="btn btn-outline-primary rounded-0">Dashboard</a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-0">Logout</button>
                        </form>
                    @endguest

                </div>
            </div>
        </div>
    </nav>
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
