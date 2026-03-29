@extends('layouts.app')

@section('content')
    <section class="page-hero page-hero--shop">
        <div class="container">
            <div class="page-hero__content">
                <span class="eyebrow">Catalogue</span>
                <h1>Shop modern essentials with a premium storefront feel.</h1>
                <p>Browse curated edits, stronger product presentation, and cleaner ecommerce browsing across every category.</p>
            </div>
        </div>
    </section>

    <section class="store-section">
        <div class="container shop-layout">

            <!-- FILTER -->
            <aside class="filter-card">
                <div class="filter-card__block">
                    <h3>Categories</h3>
                    <a href="#">Women</a>
                    <a href="#">Men</a>
                    <a href="#">Outerwear</a>
                    <a href="#">Footwear</a>
                    <a href="#">Accessories</a>
                </div>
            </aside>

            <!-- PRODUCTS -->
            <div>
                <div class="section-heading section-heading--compact">
                    <div>
                        <span class="eyebrow" id="productCount">Loading...</span>
                        <h2>Best sellers and new-season picks</h2>
                    </div>
                </div>

                <div class="product-grid" id="productGrid">
                    <p>Loading products...</p>
                </div>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetchProducts();
        });

        /* ================= FETCH PRODUCTS ================= */
        function fetchProducts(page = 1) {
            fetch(`http://127.0.0.1:8000/api/product?page=${page}`)
                .then(response => response.json())
                .then(result => {
                    if (result.status) {
                        document.getElementById("productCount").innerText = result.data.total + " products";
                        renderProducts(result.data.data);
                    } else {
                        document.getElementById("productGrid").innerHTML = "<p>Failed to load products</p>";
                    }
                })
                .catch(error => {
                    console.error(error);
                    document.getElementById("productGrid").innerHTML = "<p>Error loading products</p>";
                });
        }

        /* ================= RENDER PRODUCTS ================= */
        function renderProducts(products) {
            const grid = document.getElementById("productGrid");
            grid.innerHTML = "";

            if (products.length === 0) {
                grid.innerHTML = "<p>No products found</p>";
                return;
            }

            products.forEach(product => {

                let price = parseFloat(product.price);
                let discount = parseFloat(product.discount);
                let finalPrice = price - discount;

                let html = `
        <article class="product-card-store">
            <div class="product-card-store__media">
                <img src="${product.image}" alt="${product.name}" />
                ${discount > 0 ? `<span class="product-badge product-badge--sale">-${discount}</span>` : ''}
            </div>

            <div class="product-card-store__body">
                <span class="product-card-store__meta">
                    ${product.category ? product.category.name : 'Category'}
                </span>

                <h3>${product.name}</h3>

                <div class="product-card-store__price">
                    <strong>$${finalPrice.toFixed(2)}</strong>
                    ${discount > 0 ? `<del>$${price.toFixed(2)}</del>` : ''}
                </div>

                <button
                    class="product-card-store__cta add-to-cart-btn"
                    data-id="${product.id}">
                    Add to cart
                </button>
            </div>
        </article>
        `;

                grid.innerHTML += html;
            });

            attachCartEvents(); // 🔥 important
        }

        /* ================= ADD TO CART EVENTS ================= */
        function attachCartEvents() {
            document.querySelectorAll('.add-to-cart-btn').forEach(btn => {

                btn.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    addToCart(productId, 1, this);
                });

            });
        }

        /* ================= ADD TO CART API ================= */
        function addToCart(productId, quantity, btn) {

            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('quantity', quantity);

            var token = localStorage.getItem("token");
            // console.log(token);


            fetch('http://127.0.0.1:8000/api/cart', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {

                    if (data.status) {
                        btn.innerText = "Added ✅";
                        btn.disabled = true;
                    } else {
                        alert("❌ Failed to add to cart");
                    }

                })
                .catch(err => {
                    console.error(err);
                    alert("⚠️ Error adding to cart");
                });
        }
    </script>

@endsection
