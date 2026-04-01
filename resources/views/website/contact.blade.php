@extends('layouts.app')

@section('title', 'My Mushroom World | Contact Us')

@section('content')
  <section class="mwm-section">
    <div class="container">
      <div class="mwm-page-hero">
        <div class="mwm-page-hero__copy">
          <span class="mwm-kicker">Contact Us</span>
          <h1>Get in touch through a support page that now feels as premium as the rest of the storefront.</h1>
          <p>
            Contact page ko reference site ke style mein rebuild kiya gaya hai with warm information cards, clear contact routes, and a polished inquiry form layout.
          </p>
        </div>
        <div class="mwm-page-hero__media">
          <img src="https://cdn.shopify.com/s/files/1/0568/9986/2610/files/LucoX_Slide_2_1.png?v=1773921881" alt="Contact support" />
        </div>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-contact-layout">
        <div class="mwm-contact-card">
          <div class="mwm-contact-card__body">
            <span class="mwm-kicker">Get In Touch</span>
            <h2 style="font-size: clamp(2.2rem, 4vw, 3.3rem);">If you need to get in touch, there are several ways to do so.</h2>
            <p style="margin-top: 14px;">Use this area for customer support, trade enquiries, brand collaborations, or product-related help.</p>

            <div class="mwm-contact-stack" style="margin-top: 24px;">
              <div class="mwm-contact-item">
                <span class="mwm-contact-card__seal">01</span>
                <div>
                  <strong>Email</strong>
                  <p>info@mymushroomworld.com</p>
                </div>
              </div>
              <div class="mwm-contact-item">
                <span class="mwm-contact-card__seal">02</span>
                <div>
                  <strong>Trade enquiry</strong>
                  <p>+91 98263 22445 for trade and wholesale support.</p>
                </div>
              </div>
              <div class="mwm-contact-item">
                <span class="mwm-contact-card__seal">03</span>
                <div>
                  <strong>Customer care</strong>
                  <p>+91 79094 44999 for order help and support requests.</p>
                </div>
              </div>
              <div class="mwm-contact-item">
                <span class="mwm-contact-card__seal">04</span>
                <div>
                  <strong>Address</strong>
                  <p>226, Gufa Mandir Road, Jain Nagar, Bhopal, Madhya Pradesh 462001.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <form class="mwm-contact-form">
          <span class="mwm-kicker">Send Inquiry</span>
          <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 16px;">Tell us how we can help.</h2>

          <div class="mwm-contact-form__grid">
            <input type="text" placeholder="Your name" aria-label="Your name" />
            <input type="email" placeholder="Email address" aria-label="Email address" />
          </div>

          <div style="height: 14px;"></div>
          <div class="mwm-contact-form__grid">
            <input type="text" placeholder="Phone number" aria-label="Phone number" />
            <input type="text" placeholder="Subject" aria-label="Subject" />
          </div>

          <div style="height: 14px;"></div>
          <textarea placeholder="Share your requirement, support issue, or partnership enquiry" aria-label="Message"></textarea>

          <div class="mwm-hero__actions">
            <button type="button" class="mwm-btn mwm-btn--primary">Send Inquiry</button>
            <a href="{{ route('shop') }}" class="mwm-btn mwm-btn--secondary">Back To Shop</a>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="mwm-section">
    <div class="container">
      <div class="mwm-section-heading">
        <div>
          <span class="mwm-kicker">Support FAQs</span>
          <h2>Common help blocks styled in the same warm, rounded UI system.</h2>
        </div>
      </div>

      <div class="mwm-faq-grid">
        <article class="mwm-faq-card">
          <h3>Order updates</h3>
          <p>Use this card area for dispatch status, order timelines, or delivery tracking information.</p>
        </article>
        <article class="mwm-faq-card">
          <h3>Trade enquiries</h3>
          <p>Dedicated support text can now live in polished cards instead of unstyled paragraph blocks.</p>
        </article>
        <article class="mwm-faq-card">
          <h3>Brand questions</h3>
          <p>The redesigned layout makes it easier to place policies, contact paths, and reassurance cues.</p>
        </article>
      </div>
    </div>
  </section>
@endsection
