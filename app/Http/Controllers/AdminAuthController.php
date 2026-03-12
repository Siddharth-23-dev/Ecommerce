<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function showLoginForm(): View|RedirectResponse
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $admin = Admin::query()->where('email', $credentials['email'])->first();

        if (! $admin || ! $admin->active || ! Hash::check($credentials['password'], $admin->password)) {
            return back()
                ->withInput($request->except('password'))
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ]);
        }

        $request->session()->regenerate();
        session([
            'admin_logged_in' => true,
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function dashboard(): View
    {
        return view('admin.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget([
            'admin_logged_in',
            'admin_id',
            'admin_name',
            'admin_email',
        ]);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
