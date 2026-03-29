@extends('layouts.app')

@section('content')
    <section class="page-hero page-hero--cart">
        <div class="container">
            <div class="page-hero__content">
                <span class="eyebrow">Cart</span>
                <h1>Review your picks before checkout.</h1>
                <p>Clean cart layout, strong product hierarchy, and a more premium ecommerce checkout experience.</p>
            </div>
        </div>
    </section>

    <section class="store-section">
        <div class="container cart-layout">

            <!-- CART LIST -->
            <div class="cart-list-card" id="cartList">
                <p>Loading cart...</p>
            </div>

            <!-- SUMMARY -->
            <aside class="summary-card">
                <h2>Order summary</h2>

                <div class="summary-card__row">
                    <span>Subtotal</span>
                    <strong id="subtotal">$0</strong>
                </div>

                <div class="summary-card__row">
                    <span>Shipping</span>
                    <strong>Free</strong>
                </div>

                <div class="summary-card__row">
                    <span>Tax</span>
                    <strong id="tax">$0</strong>
                </div>

                <div class="summary-card__row summary-card__row--total">
                    <span>Total</span>
                    <strong id="total">$0</strong>
                </div>

                <a href="#" class="btn-primary-store summary-card__button">Proceed to checkout</a>
                <a href="{{ route('shop') }}" class="btn-secondary-store summary-card__button">Continue shopping</a>
            </aside>

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetchCart();
        });

        /* ================= FETCH CART ================= */
        function fetchCart() {
            var token = localStorage.getItem("token");
            // console.log(token);
            fetch('http://127.0.0.1:8000/api/cart', {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                }
            })
                .then(res => res.json())
                .then(result => {
                    if (result.status === "success") {
                        renderCart(result.data);
                    } else {
                        document.getElementById("cartList").innerHTML = "<p>Cart empty</p>";
                    }
                })
                .catch(err => {
                    console.error(err);
                    document.getElementById("cartList").innerHTML = "<p>Error loading cart</p>";
                });
        }

        /* ================= RENDER CART ================= */
        function renderCart(items) {

            const cartList = document.getElementById("cartList");

            if (!items.length) {
                cartList.innerHTML = "<p>Your cart is empty</p>";
                return;
            }

            let html = "";
            let subtotal = 0;
            let totalTax = 0;

            items.forEach(item => {

                let product = item.product;

                let price = parseFloat(product.price);
                let discount = parseFloat(product.discount);
                let tax = parseFloat(product.tax);
                let qty = item.quantity;

                let finalPrice = price - discount;
                let itemTotal = finalPrice * qty;
                let itemTax = tax * qty;

                subtotal += itemTotal;
                totalTax += itemTax;

                html += `
        <article class="cart-item-store">

            <div class="cart-item-store__media">
                <img src="http://127.0.0.1:8000/uploads/products/${product.image}" alt="${product.name}" />
            </div>

            <div class="cart-item-store__body">
                <span class="product-card-store__meta">Product</span>
                <h3>${product.name}</h3>
                <p>SKU: ${product.sku}</p>
            </div>

            <div class="cart-item-store__meta-block">
                <span>Qty</span>
                <strong>${qty}</strong>
            </div>

            <div class="cart-item-store__meta-block">
                <span>Price</span>
                <strong>$${itemTotal.toFixed(2)}</strong>
            </div>

        </article>
        `;
            });

            cartList.innerHTML = html;

            let total = subtotal + totalTax;

            document.getElementById("subtotal").innerText = "$" + subtotal.toFixed(2);
            document.getElementById("tax").innerText = "$" + totalTax.toFixed(2);
            document.getElementById("total").innerText = "$" + total.toFixed(2);
        }
    </script>

@endsection
