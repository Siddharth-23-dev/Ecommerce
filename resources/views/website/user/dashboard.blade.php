@extends('layouts.app')

@section('content')
<div class="container" style="margin: 60px auto; min-height: 400px;">
    <div style="padding: 30px; border: 1px solid #eaeaea; border-radius: 8px;">
        <h2 style="margin-bottom: 20px;">Welcome back, {{ Auth::user()->name }}!</h2>
        <p>This is your customer dashboard. From here, you will be able to manage your orders, track shipments, and update your profile.</p>

        <div style="margin-top: 30px; display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            <div style="padding: 20px; background: #f9f9f9; border-radius: 6px;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">My Orders</h3>
                <p style="margin-bottom: 15px; color: #666;">View your order history and tracking status.</p>
                <a href="#" class="btn-secondary-store" style="font-size: 0.9rem; padding: 8px 16px;">View Orders</a>
            </div>

            <div style="padding: 20px; background: #f9f9f9; border-radius: 6px;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Account Details</h3>
                <p style="margin-bottom: 15px; color: #666;">Manage your personal information and password.</p>
                <a href="#" class="btn-secondary-store" style="font-size: 0.9rem; padding: 8px 16px;">Edit Profile</a>
            </div>
            
             <div style="padding: 20px; background: #f9f9f9; border-radius: 6px;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Addresses</h3>
                <p style="margin-bottom: 15px; color: #666;">Manage your shipping and billing addresses.</p>
                <a href="#" class="btn-secondary-store" style="font-size: 0.9rem; padding: 8px 16px;">Manage Addresses</a>
            </div>
        </div>
    </div>
</div>
@endsection
