<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotEmailController extends Controller
{
    


    public function showForgotEmailForm()
    {
        return view('auth.forgot-email');
    }

    


    public function sendEmailReminder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        
        $user = User::where('name', 'LIKE', '%' . $request->name . '%')->first();

        if (!$user) {
            return back()->withErrors([
                'name' => 'Nama tidak ditemukan dalam database kami.',
            ]);
        }

        
        try {
            Mail::raw(
                "Halo {$user->name},\n\n" .
                "Kami menemukan akun Anda berdasarkan nama yang Anda masukkan.\n\n" .
                "Email terdaftar: {$user->email}\n" .
                "Tanggal registrasi: {$user->created_at->format('d M Y')}\n\n" .
                "Jika ini bukan akun Anda, abaikan email ini.\n\n" .
                "Salam,\n" .
                "Tim JBmotorBekas",
                function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Pengingat Email Akun JBmotorBekas');
                }
            );

            return back()->with('status', 'Email pengingat telah dikirim ke alamat email yang terdaftar dengan nama tersebut.');

        } catch (\Exception $e) {
            return back()->withErrors([
                'name' => 'Terjadi kesalahan saat mengirim email. Silakan coba lagi.',
            ]);
        }
    }
}
