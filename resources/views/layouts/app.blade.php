<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
  <title>@yield('title', 'My Mushroom World')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="My Mushroom World" />
  <link rel="shortcut icon" href="{{ asset('assets/website/images/favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/website/css/plugins/swiper.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/website/css/custom.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/website/css/mushroom-world.css') }}" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer">
  @stack('styles')
</head>
<body class="mwm-site">
  @include('website.partials.svg')
  @include('website.partials.header')

  <main>
    @yield('content')
  </main>

  @include('website.partials.footer')

  <script src="{{ asset('assets/website/js/plugins/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/website/js/plugins/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/website/js/plugins/bootstrap-slider.min.js') }}"></script>
  <script src="{{ asset('assets/website/js/plugins/swiper.min.js') }}"></script>
  <script src="{{ asset('assets/website/js/plugins/countdown.js') }}"></script>
  <script src="{{ asset('assets/website/js/theme.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggles = document.querySelectorAll('[data-menu-toggle]');

      toggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {
          const target = document.querySelector(toggle.getAttribute('data-target'));

          if (!target) {
            return;
          }

          const isOpen = target.classList.toggle('is-open');
          toggle.setAttribute('aria-expanded', String(isOpen));
        });
      });
    });
  </script>
  @stack('scripts')
</body>
</html>
