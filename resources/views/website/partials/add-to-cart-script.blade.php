<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cartApiUrl = @json(url('/api/cart'));
    const loginUrl = @json(route('login'));
    const isGuest = @json(!auth()->check());

    async function addToCart(productId, btn) {
      if (isGuest) {
        window.location.href = loginUrl;
        return;
      }

      const originalText = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = 'Adding...';

      try {
        const response = await fetch(cartApiUrl, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
          },
          body: JSON.stringify({ product_id: productId, quantity: 1 })
        });

        const result = await response.json();

        if (!response.ok) {
          throw new Error(result.message || 'Failed to add to cart');
        }

        btn.innerHTML = 'Added!';
        btn.classList.add('mwm-btn--accent');
        window.dispatchEvent(new CustomEvent('cart:updated'));

        setTimeout(function () {
          btn.innerHTML = originalText;
          btn.disabled = false;
          btn.classList.remove('mwm-btn--accent');
        }, 1500);
      } catch (error) {
        alert(error.message);
        btn.innerHTML = originalText;
        btn.disabled = false;
      }
    }

    document.querySelectorAll('.add-to-cart-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        addToCart(btn.dataset.id, btn);
      });
    });
  });
</script>
