@extends('layouts.app')

@section('content')
  <section class="page-hero page-hero--contact">
    <div class="container">
      <div class="page-hero__content">
        <span class="eyebrow">Contact</span>
        <h1>Talk to the team behind the storefront.</h1>
        <p>Use the contact page for support, order help, brand queries, or partnership discussions.</p>
      </div>
    </div>
  </section>

  <section class="store-section">
    <div class="container contact-layout">
      <div class="contact-card">
        <span class="eyebrow">Get in touch</span>
        <h2>We usually reply within one business day.</h2>
        <div class="contact-list">
          <div>
            <strong>Email</strong>
            <span>support@surfsidecommerce.com</span>
          </div>
          <div>
            <strong>Phone</strong>
            <span>+1 800 555 0199</span>
          </div>
          <div>
            <strong>Studio</strong>
            <span>123 Beach Avenue, Los Angeles, CA</span>
          </div>
        </div>
      </div>

      <form class="contact-form-card">
        <div class="contact-form-grid">
          <input type="text" placeholder="Your name" aria-label="Your name" />
          <input type="email" placeholder="Email address" aria-label="Email address" />
        </div>
        <input type="text" placeholder="Subject" aria-label="Subject" />
        <textarea rows="6" placeholder="Tell us how we can help" aria-label="Message"></textarea>
        <button type="submit" class="btn-primary-store">Send message</button>
      </form>
    </div>
  </section>
@endsection
