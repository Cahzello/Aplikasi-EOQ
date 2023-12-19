<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Calculate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show_data(User $data)
    {   
        return view('index', [
            'active' => 'user',
            'response' => $data
        ]);
    }

    public function editRole(Request $request, User $data)
    {
        User::where('id', $data->id)->update(['role' => $request->role]);

        return redirect('/user-list/' . $data->id)->with('success', 'Role telah berhasil diubah');
    }

    public function updateUsername(Request $request)
    {   
        $validatedRequest = $request->validate([
            'username' => 'unique:users|max:255|min:3'
        ],[
            'username.min' => 'Huruf dalam username harus melebihi atau sama dengan 3 huruf!',

        ]);

        $user_id = auth()->user()->id;

        User::where('id', $user_id)->update($validatedRequest);

        return redirect('/user-profile')->with('success', 'Username telah berhasil diubah');

    }

    public function updatePassword(Request $request)
    {
        $validatedRequest = $request->validate([
            'password' => 'min:3|max:255'
        ],[
            'password.min' => 'Huruf dalam password harus melebihi atau sama dengan 3 huruf!',
        ]);
        
        if ($request->password !== $request->repeat_pw){
            return redirect('/user-profile')->withErrors('The password should match');
        }

        $validatedRequest['password'] = bcrypt($validatedRequest['password']);

        $user_id = auth()->user()->id;

        User::where('id', $user_id)->update($validatedRequest);

        return redirect('/user-profile')->with('success', 'Password telah berhasil diubah');
    }

    public function delete_acc(Request $request)
    {   
        $user_id = auth()->user()->id;

        $products = Product::where('user_id', $user_id)->get();

        foreach ($products as $product) {
            Calculate::where('product_id', $product->id)->delete();
        }

        Product::where('user_id', $user_id)->delete();    

        User::where('id', $user_id)->delete();
        
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Akun Berhasil Dihapus');
    }

    public function delete_acc_admin_priv(User $data)
    {
        $user_id = $data->id;
        $products = Product::where('user_id', $user_id)->get();

        foreach ($products as $product) {
            Calculate::where('product_id', $product->id)->delete();
        }

        Product::where('user_id', $user_id)->delete();    

        User::where('id', $user_id)->delete();

        return redirect('/user-list')->with('success', 'Akun Berhasil Dihapus');
    }
}
