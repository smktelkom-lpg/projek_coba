<?php

// Di dalam file app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, buat token baru
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json([
                'token' => $token,
            ], 200);
        } else {
            // Autentikasi gagal
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }
    }

    // Anda juga dapat menambahkan metode logout() di sini
}
