<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login_validate(Request $request)
    {   
        $rememberMe = $request->checkBox;

        $validatedRequest = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Masukan username anda!',
            'password.required' => 'Masukan password anda!',
        ]);

        if(Auth::attempt($validatedRequest, $rememberMe)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return redirect('/login')->withErrors('Username atau Password salah.')->onlyInput('username');

    }

    public function register(Request $request)
    {
        $validatedRequest = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users'
        ],[
            'username.required' => 'Masukan username anda!',
            'password.required' => 'Masukan password anda!',
            'email.required' => 'Masukan email anda!',
            'username.min' => 'Jumlah huruf username harus melebihi 3 huruf!',
            'password.min' => 'Jumlah huruf password harus melebihi 3 huruf!',
            'email.unique' => 'Email telah terpakai, coba gunakan email yang lain!',
            'username.unique' => 'Usename telah terpakai, coba gunakan Usename yang lain!',
        ]);
        $repeatedpw = $request->repeatedpw;

        if($validatedRequest['password'] !== $repeatedpw){
            return redirect('/register')->withErrors('Password tidak sama!')->onlyInput('username', 'email');    
        }

        $validatedRequest['password'] = bcrypt($validatedRequest['password']);

        $validatedRequest['role'] = 'user';
        
        // dd($validatedRequest);
        User::create($validatedRequest);

        return redirect('/login')->with('success','Berhasil Terdaftar');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with('success', 'Berhasil logout');
    }
}
