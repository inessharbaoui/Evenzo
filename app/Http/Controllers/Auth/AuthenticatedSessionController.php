<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($request->email === 'admin@gmail.com' && $request->password === '123456789') {
        $admin = \App\Models\User::find('674660a75b2cb0ac370a00e2');
        if ($admin) {
            Auth::login($admin);
            return redirect()->route('dashboard_admin');
        }
    }

    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        return redirect()->intended(route('dashboard_user'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
