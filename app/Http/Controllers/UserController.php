<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            //'nama input'=>['jenis_validasi']
            'name' => ['required', 'min:3'],
            //unique data tabel tidak boleh duplikat
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:10']
        ], [
            //teks error yang bakal muncul kalo validasi gagal
            'name.required' => 'Nama lengkap harus diisi',
            'name.min' => 'Nama lengkap harus diisi minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email harus diisi dengan data yang belum terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus diisi minimal 8 karakter',
            'password.max' => 'Password harus diisi hanya sampai 10 karakter',
        ]);

        $createAccount = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])

        ]);

        return redirect()->route('login')->with('succes', 'Berhasil membuat akun! silahkan login.');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => ['required'],
                'password' => ['required']
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );
        //ambildataselaintoken
        $auth = $request->except(['_token']);
        $checkAuth = Auth::attempt($auth);
        // dd($auth, $checkAuth);
        if ($checkAuth) {
            return redirect()->route('home')->with('succes', 'Berhasil login!');
        } else {
            return redirect()->route('login')->with('error', 'Email dan password salah. Coba lagi!')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')->with('success', 'Berhasil logout!');
    }
}
