<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ======================
    // REGISTER
    // ======================
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'
            ],
            'password' => 'required|min:6|confirmed',
            'no_hp' => 'required|numeric|min:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'email.regex' => 'Email harus menggunakan Gmail (@gmail.com)',
        ]);

        // upload foto
        $fotoName = null;
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/user'), $fotoName);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'foto' => $fotoName,
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }

    // ======================
    // LOGIN
    // ======================
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    // ======================
    // DASHBOARD
    // ======================
    public function dashboardAdmin()
    {
        $sliders = Slider::latest()->get();
        return view('admin.dashboard', compact('sliders'));
    }

    public function dashboardUser()
    {
        $sliders = Slider::latest()->get();
        return view('user.dashboard', compact('sliders'));
    }
}
