<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'role' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $user->save();

        return redirect()->route('login');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required'],
            'role'     => ['required'],
            'email'         => ['required', 'email','unique:users'],
            'password'      => ['required', 'confirmed'],
        ],
            [
                'name.required'    => 'Masukkan Nama Lengkap Anda !',
                'role.required'    => 'Pilih Role !',
                'email.required'        => 'Masukkan Alamat Email Anda !',
                'email.unique'          => 'Alamat Email Sudah Terdaftar !',
                'password.required'     => 'Masukkan Password Anda !',
                'password.confirmed'    => 'Konfirmasi Password Salah !',
            ]
        );
    }

    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'pemegang_saham') {
                return redirect('pemegang-saham');
            }
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        return redirect('/');
    }
}
