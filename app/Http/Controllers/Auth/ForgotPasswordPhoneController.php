<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordPhoneController extends Controller
{
    /**
     * 1. Menampilkan Form Input No HP
     * Sesuai Route: password.phone
     * Sesuai View: forgot-password-phone.blade.php
     */
    public function showPhoneForm()
    {
        return view('auth.forgot-password-phone'); 
    }

    /**
     * 2. Mengirim Kode OTP (Simulasi)
     * Sesuai Route: password.phone.send
     */
    public function sendCode(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|exists:users,no_hp',
        ], [
            'no_hp.exists' => 'Nomor HP tidak ditemukan dalam sistem.'
        ]);

        // Membuat kode OTP acak 6 digit
        $otp = rand(100000, 999999);

        // Menyimpan data ke Session untuk proses verifikasi
        Session::put('reset_no_hp', $request->no_hp);
        Session::put('otp', $otp);

        // Redirect ke halaman verifikasi sesuai route Anda
        return redirect()->route('password.verify')->with('success', 'Kode OTP berhasil dikirim.');
    }

    /**
     * 3. Menampilkan Form Verifikasi Kode
     * Sesuai Route: password.verify
     * Sesuai View: verify-code.blade.php
     */
    public function showVerifyForm()
    {
        // Proteksi agar tidak bisa akses langsung tanpa input nomor HP dulu
        if (!Session::has('reset_no_hp')) {
            return redirect()->route('password.phone');
        }
        return view('auth.verify-code');
    }

    /**
     * 4. Proses Verifikasi Kode OTP
     * Sesuai Route: password.verify.submit
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        if ($request->code == Session::get('otp')) {
            // Tandai bahwa OTP sudah benar
            Session::put('otp_verified', true);
            return redirect()->route('password.reset.phone');
        }

        return back()->withErrors(['code' => 'Kode verifikasi salah!']);
    }

    /**
     * 5. Menampilkan Form Reset Password Baru
     * Sesuai Route: password.reset.phone
     * Sesuai View: reset-password-phone.blade.php
     */
    public function showResetForm()
    {
        // Pastikan user sudah melewati tahap verifikasi OTP
        if (!Session::get('otp_verified')) {
            return redirect()->route('password.verify');
        }
        return view('auth.reset-password-phone');
    }

    /**
     * 6. Proses Update Password Baru ke Database
     * Sesuai Route: password.reset.phone.submit
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('no_hp', Session::get('reset_no_hp'))->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            // Hapus semua session terkait reset password setelah berhasil
            Session::forget(['reset_no_hp', 'otp', 'otp_verified']);

            return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan login.');
        }

        return redirect()->route('password.phone')->withErrors(['no_hp' => 'Terjadi kesalahan sistem.']);
    }
}