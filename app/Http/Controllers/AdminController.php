<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('message', 'Admin Login Successfully');
            } else {
                Auth::logout();
                return back()->with(['error' => 'Only admin can login.']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')->with('message', 'Logout Successfully');
    }

    public function dashboard()
    {
        try {
            if (Auth::check()) {
                return view('Admin/dashboard/index');
            } else {
                return redirect()->route('index');
            }
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
