<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate(['username' => 'required', 'password' => 'required']);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['username' => 'Username atau password salah.',]);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
