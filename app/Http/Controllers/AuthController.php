<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        if (Auth::attempt([
            'email' => 'admin@example.com',
            'password' => $request->password,
        ], true)) {
            $request->session()->regenerate();

            return redirect()
            ->intended('/admin/mansions')
            ->with('toast', ['success', '管理画面にログインしました']);
        }

        return back()
        ->onlyInput('email')
        ->with('toast', ['error', 'パスワードが違います']);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')
        ->with('toast', ['success', '管理画面からログアウトしました']);
    }
}
