<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register()
    {
        // apabila ada session nama tak boleh
        if (!Session::get('name')) {
            return view('auth.register');
        } else {
            return redirect()->route('home');
        }
    }

    public function processRegister(Request $request)
    {
        // validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        // apabila ada session nama tak boleh
        if (!Session::get('name')) {
            return view('auth.login');
        } else {
            return redirect()->route('home');
        }
    }

    public function processLogin(Request $request) 
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $email = $request->email;
    	$pass = $request->password;

        // ambil data user di db
        $user = User::where('email', $email)->first();

        // cek email
        if ($user) {
            // cek password
            if (Hash::check($pass, $user->password)) {
                // isi session user yang login
                Session::put('role_id', $user->role_id);
                Session::put('name', $user->name);
                Session::put('email', $user->email);
                // status login
                Session::put('login',TRUE);

                return redirect()->route('home')->with('success', 'lol');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

    }

    public function logout()
    {
        // hapus session
        Session::flush();

        return redirect()->route('home');
    }
}
