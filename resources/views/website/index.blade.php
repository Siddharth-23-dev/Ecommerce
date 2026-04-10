@extends('layouts.app')

@section('title', 'My Mushroom World | Home')

@section('content')

    {{-- ===================== HERO SLIDESHOW ===================== --}}
    <section class="container-fluid px-0">
        <div id="homeBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="/products/mushroomex-mushroom-powder" class="d-block">
                        <picture>
                            <source media="(max-width: 749px)" srcset="images/MX_Mobile_View_jpg.jpg">
                            <img src="images/MX_Desktop_View_jpg.jpg"
                                 srcset="images/MX_Desktop_View_jpg_3.jpg 1100w, images/MX_Desktop_View_jpg_2.jpg 1500w, images/MX_Desktop_View_jpg.jpg 3840w"
                                 sizes="100vw" class="d-block w-100" alt="MushroomEx"
                                 style="height:520px;object-fit:cover;" fetchpriority="high">
                        </picture>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="/products/luco-x-ayurvedic-capsules-white-discharge-uti-relief" class="d-block">
                        <picture>
                            <source media="(max-width: 749px)" srcset="images/LucoX_Mobile_View_jpg.jpg">
                            <img src="images/LucoX_Desktop_View_jpg.jpg"
                                 srcset="images/LucoX_Desktop_View_jpg_2.jpg 1100w, images/LucoX_Desktop_View_jpg.jpg 3840w"
                                 sizes="100vw" class="d-block w-100" alt="LucoX"
                                 style="height:520px;object-fit:cover;" loading="lazy">
                        </picture>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="/products/kabzx-110gm-ayurvedic-laxative-for-constipation-and-gut-health-1" class="d-block">
                        <picture>
                            <source media="(max-width: 749px)" srcset="images/KabzX_Mobile_View_jpg.jpg">
                            <img src="images/KabzX_Desktop_View_jpg.jpg"
                                 srcset="images/KabzX_Desktop_View_jpg_6.jpg 1100w, images/KabzX_Desktop_View_jpg.jpg 3840w"
                                 sizes="100vw" class="d-block w-100" alt="KabzX"
                                 style="height:520px;object-fit:cover;" loading="lazy">
                        </picture>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="/products/menx-ayurvedic-capsules-testosterone-booster-endurance" class="d-block">
                        <picture>
                            <source media="(max-width: 749px)" srcset="images/MenX_Mobile_View_jpg.jpg">
                            <img src="images/MenX_Desktop_View_jpg.jpg"
                                 srcset="images/MenX_Desktop_View_jpg_7.jpg 1100w, images/MenX_Desktop_View_jpg.jpg 3840w"
                                 sizes="100vw" class="d-block w-100" alt="MenX"
                                 style="height:520px;object-fit:cover;" loading="lazy">
                        </picture>
                    </a>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#homeBannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeBannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeBannerCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#homeBannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#homeBannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#homeBannerCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
        </div>
    </section>

    {{-- ===================== BESTSELLERS ===================== --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold fs-3 mb-1">Shop Our Bestsellers</h2>
                <p class="text-muted mb-0" style="font-size:14px">Nature's Finest, Crafted for YOU!</p>
            </div>
            <div class="row g-3">

                {{-- Product 1 --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden" style="height:220px;">
                            <img src="images/WhatsApp_Image_2026-02-21_at_11.51.50_AM.jpg"
                                 alt="Mushroomex" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.06)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:13px">Mushroomex – Weight Gainer Powder Ayurvedic Formula 100g</h6>
                            <p class="fw-bold mb-0" style="font-size:15px">₹ 379.00</p>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <a href="/products/mushroomex-mushroom-powder" class="btn btn-dark btn-sm w-100 rounded-3 fw-semibold" style="font-size:13px">View Product</a>
                        </div>
                    </div>
                </div>

                {{-- Product 2 --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden position-relative" style="height:220px;">
                            <img src="images/Front_Images_Shilajit_Gold_jpg.jpg"
                                 alt="ShilajitX Gold" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.06)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 rounded-2" style="font-size:10px">22% OFF</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:13px">ShilajitX Gold Resin – Premium Shilajit with Cordyceps Mushroom</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold" style="font-size:15px">₹ 1,449.00</span>
                                <s class="text-muted" style="font-size:12px">₹ 1,849.00</s>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <form method="post" action="/cart/add">
                                @csrf
                                <input type="hidden" name="id" value="41230744420434">
                                <button type="submit" class="btn btn-dark btn-sm w-100 rounded-3 fw-semibold" style="font-size:13px">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Product 3 --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden position-relative" style="height:220px;">
                            <img src="images/MenXCapsuleSlide1.png"
                                 alt="MENZ-X" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.06)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 rounded-2" style="font-size:10px">20% OFF</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:13px">MENZ-X Capsule – Advanced Ayurvedic Male Stamina & Strength</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold" style="font-size:15px">₹ 1,399.00</span>
                                <s class="text-muted" style="font-size:12px">₹ 1,750.00</s>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <form method="post" action="/cart/add">
                                @csrf
                                <input type="hidden" name="id" value="41230744551506">
                                <button type="submit" class="btn btn-dark btn-sm w-100 rounded-3 fw-semibold" style="font-size:13px">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Product 4 --}}
                <div class="col-6 col-md-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden position-relative" style="height:220px;">
                            <img src="images/LucoXSlide1.png"
                                 alt="LUCOX" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.06)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 rounded-2" style="font-size:10px">21% OFF</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:13px">LUCOX Capsule – Advanced Ayurvedic Feminine Balance & Wellness</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold" style="font-size:15px">₹ 379.00</span>
                                <s class="text-muted" style="font-size:12px">₹ 480.00</s>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <form method="post" action="/cart/add">
                                @csrf
                                <input type="hidden" name="id" value="41230743994450">
                                <button type="submit" class="btn btn-dark btn-sm w-100 rounded-3 fw-semibold" style="font-size:13px">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===================== PROMO BANNER ===================== --}}
    <section class="container-fluid px-0">
        <a href="/products/mushroomex-mushroom-powder" class="d-block">
            <img src="images/Group-1019-1.png"
                 srcset="images/Group-1019-1_2.png 1100w, images/Group-1019-1_3.png 1500w, images/Group-1019-1.png 3840w"
                 sizes="100vw" alt="Promo Banner" class="w-100 d-block" loading="lazy">
        </a>
    </section>

    {{-- ===================== OUR PRODUCT RANGE ===================== --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold fs-3 mb-1">Our Product Range</h2>
                <p class="text-muted mb-0" style="font-size:14px">Discover a world of wellness with the 'Power of Mushrooms'</p>
            </div>

            {{-- Desktop --}}
            <div class="d-none d-lg-flex gap-3 align-items-stretch">
                <div style="width:38%;flex-shrink:0;">
                    <img src="images/G2-AD-MushrromX_2023_11_03_0015.png" alt="Product Range" class="w-100 h-100 rounded-4 object-fit-cover">
                </div>
                <div class="row g-3 flex-grow-1 m-0">
                    <div class="col-6 p-0 pe-2 pb-2">
                        <a href="/products/menx-ayurvedic-powder-testosterone-stamina-booster">
                            <img src="images/Group-1048-2-1.png" alt="MenX" class="w-100 rounded-4">
                        </a>
                    </div>
                    <div class="col-6 p-0 ps-2 pb-2">
                        <a href="/products/mushroomex-mushroom-powder">
                            <img src="images/Group-346.png" alt="MushroomX" class="w-100 rounded-4">
                        </a>
                    </div>
                    <div class="col-6 p-0 pe-2 pt-1">
                        <a href="/products/kabzx-110gm-ayurvedic-laxative-for-constipation-and-gut-health-1">
                            <img src="images/Group-347.png" alt="KabzX" class="w-100 rounded-4">
                        </a>
                    </div>
                    <div class="col-6 p-0 ps-2 pt-1">
                        <a href="/products/luco-x-ayurvedic-capsules-white-discharge-uti-relief">
                            <img src="images/Group-345.png" alt="LucoX" class="w-100 rounded-4">
                        </a>
                    </div>
                </div>
            </div>

            {{-- Mobile --}}
            <div class="d-lg-none">
                <div class="mb-3">
                    <img src="images/G2-AD-MushrromX_2023_11_03_0015.png" alt="Product Range" class="w-100 rounded-4">
                </div>
                <div class="row g-2">
                    <div class="col-6"><a href="/products/menx-ayurvedic-powder-testosterone-stamina-booster"><img src="images/Group-1048-2-1.png" alt="MenX" class="w-100 rounded-3"></a></div>
                    <div class="col-6"><a href="/products/mushroomex-mushroom-powder"><img src="images/Group-346.png" alt="MushroomX" class="w-100 rounded-3"></a></div>
                    <div class="col-6"><a href="/products/kabzx-110gm-ayurvedic-laxative-for-constipation-and-gut-health-1"><img src="images/Group-347.png" alt="KabzX" class="w-100 rounded-3"></a></div>
                    <div class="col-6"><a href="/products/luco-x-ayurvedic-capsules-white-discharge-uti-relief"><img src="images/Group-345.png" alt="LucoX" class="w-100 rounded-3"></a></div>
                </div>
            </div>

            <p class="text-center fw-semibold mt-4 mb-0" style="font-size:14px">Trusted By Ajay Devgn.</p>
        </div>
    </section>

    {{-- ===================== MAGIC OF MUSHROOMS ===================== --}}
    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold fs-3 mb-1"><span style="color:#266f3c">MAGIC</span> OF OUR MUSHROOMS</h2>
            <p class="text-muted mb-4" style="font-size:14px">Discover a World of Wellness with the 'Power of mushrooms'</p>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <img src="images/Group-243_2a33143e-d03c-4e5e-9dad-dfad6af3c544.png" alt="Handpicked" class="img-fluid mb-2" style="max-width:120px" loading="lazy">
                    <p class="fw-semibold mb-0" style="font-size:13px">Handpicked</p>
                </div>
                <div class="col-6 col-md-3">
                    <img src="images/Group-244_31388080-fc2d-45e3-b643-dc99d07db47a.png" alt="Certified" class="img-fluid mb-2" style="max-width:120px" loading="lazy">
                    <p class="fw-semibold mb-0" style="font-size:13px">Certified</p>
                </div>
                <div class="col-6 col-md-3">
                    <img src="images/Group-245_9112e669-14a2-4826-9ed6-c96204028e61.png" alt="Authentic" class="img-fluid mb-2" style="max-width:120px" loading="lazy">
                    <p class="fw-semibold mb-0" style="font-size:13px">Authentic</p>
                </div>
                <div class="col-6 col-md-3">
                    <img src="images/Group-246_3a4f8617-a864-43a6-98e1-103bb49a3b87.png" alt="Sustainable" class="img-fluid mb-2" style="max-width:120px" loading="lazy">
                    <p class="fw-semibold mb-0" style="font-size:13px">Sustainable</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== 15 YEARS BANNER ===================== --}}
    <section class="py-5" style="background:#266f3c;">
        <div class="container">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-md-4 text-center">
                    <img src="images/Group-1041_111.png" alt="15 Years" class="img-fluid" style="max-width:260px">
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-medium text-white mb-0 lh-sm" style="font-size:clamp(22px,4vw,40px)">
                        An unshakeable dedication of 15 Wonderful Years
                    </h2>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== CAREFULLY CRAFTED ===================== --}}
    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold fs-3 mb-1">Carefully Crafted</h2>
            <p class="text-muted mb-4" style="font-size:14px">Our Products are crafted using the finest ingredients and traditional ayurvedic techniques</p>
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <img src="images/Group-242_aa58a47c-6a2b-40ec-bb9b-df8a623867fc.png"
                         alt="Crafted 1" class="w-100 rounded-4" loading="lazy">
                </div>
                <div class="col-12 col-md-6">
                    <img src="images/Intersection-41_42163c43-4bd3-479a-81de-4e2888301f17.png"
                         alt="Crafted 2" class="w-100 rounded-4" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== LATEST BLOGS ===================== --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold fs-3 mb-4">Our Latest Blogs</h2>
            <div class="row g-4">

                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden" style="height:200px;">
                            <img src="images/WhatsApp_Image_2026-03-29_at_9.49.00_PM.jpg"
                                 alt="Blog 1" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <p class="text-muted mb-1" style="font-size:11px">March 31, 2026 &middot; Bharat Belwanshi</p>
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:14px">Best Ayurvedic Ingredients That Help Increase Healthy Weight Naturally</h6>
                            <p class="text-muted mb-0" style="font-size:12.5px;line-height:1.6">Everyone talks about losing weight. Almost no one talks about the struggle of gaining it...</p>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <a href="/blogs/articles/best-ayurvedic-ingredients-that-help-increase-healthy-weight-naturally"
                               class="btn btn-outline-dark btn-sm rounded-3 fw-semibold w-100" style="font-size:13px">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden" style="height:200px;">
                            <img src="images/WhatsApp_Image_2026-03-29_at_9.48.59_PM.jpg"
                                 alt="Blog 2" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <p class="text-muted mb-1" style="font-size:11px">March 31, 2026 &middot; Bharat Belwanshi</p>
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:14px">2 Crore+ People Tried This Ayurvedic Weight Gain Formula! Here's Why</h6>
                            <p class="text-muted mb-0" style="font-size:12.5px;line-height:1.6">For years, being skinny has often been mistaken for being healthy...</p>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <a href="/blogs/articles/2-crore-people-tried-this-ayurvedic-weight-gain-formula-here-s-why"
                               class="btn btn-outline-dark btn-sm rounded-3 fw-semibold w-100" style="font-size:13px">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="overflow-hidden" style="height:200px;">
                            <img src="images/MX_Blog_13.png"
                                 alt="Blog 3" class="w-100 h-100 object-fit-cover"
                                 style="transition:transform 0.4s ease"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'" loading="lazy">
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <p class="text-muted mb-1" style="font-size:11px">March 8, 2025 &middot; Bharat Belwanshi</p>
                            <h6 class="fw-semibold lh-sm mb-2" style="font-size:14px">Stop Believing These 5 Weight Gain Myths (Here's What Actually Works)</h6>
                            <p class="text-muted mb-0" style="font-size:12.5px;line-height:1.6">When it comes to weight gain, advice is everywhere—eat more, skip cardio, try supplements...</p>
                        </div>
                        <div class="card-footer bg-white border-0 px-3 pb-3 pt-1">
                            <a href="/blogs/articles/stop-believing-these-5-weight-gain-myths-here-s-what-actually-works"
                               class="btn btn-outline-dark btn-sm rounded-3 fw-semibold w-100" style="font-size:13px">Read More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===================== BRAND PRESENTERS ===================== --}}
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="fw-bold fs-3 mb-4 text-center">Our Brand's Presenters</h2>

            {{-- Desktop: 3-per-slide carousel --}}
            <div class="d-none d-md-block">
                <div id="presenterCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row g-3">
                                <div class="col-md-4"><img src="images/BP2.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                                <div class="col-md-4"><img src="images/BP1.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                                <div class="col-md-4"><img src="images/BP8.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row g-3">
                                <div class="col-md-4"><img src="images/BP7.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                                <div class="col-md-4"><img src="images/BP6.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                                <div class="col-md-4"><img src="images/BP5.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row g-3">
                                <div class="col-md-4"><img src="images/BP3.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                                <div class="col-md-4"><img src="images/BP4.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                                <div class="col-md-4"><img src="images/BP1.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:240px" loading="lazy"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-target="#presenterCarousel" data-bs-slide="prev" style="width:36px;height:36px;padding:0;border-radius:50%">&#8592;</button>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-target="#presenterCarousel" data-bs-slide="next" style="width:36px;height:36px;padding:0;border-radius:50%">&#8594;</button>
                    </div>
                </div>
            </div>

            {{-- Mobile: 1-per-slide carousel --}}
            <div class="d-md-none">
                <div id="presenterCarouselMobile" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        @php $bpImages = ['BP2','BP1','BP8','BP7','BP6','BP5','BP3','BP4']; @endphp
                        @foreach($bpImages as $i => $bp)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                <img src="images/{{ $bp }}.png" alt="Presenter" class="w-100 rounded-4 object-fit-cover" style="height:220px" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#presenterCarouselMobile" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#presenterCarouselMobile" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

        </div>
    </section>

@endsection
