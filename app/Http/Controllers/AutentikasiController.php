<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;

class AutentikasiController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $validatedRequest = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Masukan username anda!',
            'password.required' => 'Masukan password anda!',
        ]);

        if(Auth::attempt($validatedRequest)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return redirect('/login')->withErrors('Username atau Password salah.')->onlyInput('username');

    }

    public function register(Request $request)
    {
        $validatedRequest = $request->validate([
            'username' => 'required|min:6|max:255|unique:users',
            'password' => 'required|min:6|max:255',
            'email' => 'required|email:dns|unique:users'
        ],[
            'username.required' => 'Masukan username anda!',
            'password.required' => 'Masukan password anda!',
            'email.required' => 'Masukan email anda!',
            'username.min' => 'Jumlah huruf username harus melebihi 6 huruf!',
            'password.min' => 'Jumlah huruf password harus melebihi 6 huruf!',
            'email.unique' => 'Email telah terpakai, coba gunakan email yang lain!',
            'username.unique' => 'Usename telah terpakai, coba gunakan Usename yang lain!',
        ]);
        $repeatedpw = $request->repeatedpw;

        if($validatedRequest['password'] !== $repeatedpw){
            return redirect('/register')->withErrors('Password tidak sama!');    
        }

        $validatedRequest['password'] = bcrypt($validatedRequest['password']);

        User::create($validatedRequest);

        return redirect('/register')->withErrors('Form isi tidak sesuai kriteria.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with('success', 'Berhasil logout');
    }
}
