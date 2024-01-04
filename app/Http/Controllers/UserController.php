<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Items_results;
use App\Models\Item_detail;
use App\Models\Items_summary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show_data(User $data)
    {
        $this->authorize('admin');
        return view('user-profile.index', [
            'active' => 'user',
            'response' => $data
        ]);
    }

    public function editRole(Request $request, User $data)
    {
        $this->authorize('admin');
        User::where('id', $data->id)->update(['role' => $request->role]);

        return redirect('/user-list/' . $data->id)->with('success', 'Role telah berhasil diubah');
    }

    public function updateUsername(Request $request)
    {
        $validatedRequest = $request->validate([
            'username' => 'unique:users|max:255|min:3'
        ], [
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
        ], [
            'password.min' => 'Huruf dalam password harus melebihi atau sama dengan 3 huruf!',
        ]);

        if ($request->password !== $request->repeat_pw) {
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

        $item_id = Item::where('user_id', $user_id)->get('user_id');
        $count = Item::where('user_id', $user_id)->exists();

        if ($count) {
            Items_results::where('item_id', $item_id)->delete();
            Items_summary::where('item_id', $item_id)->delete();
            Item_detail::where('item_id', $item_id)->delete();
            Item::where('id', $item_id)->delete();
        }

        User::where('id', $user_id)->delete();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Akun Berhasil Dihapus');
    }

    public function delete_acc_admin_priv(User $data)
    {
        $this->authorize('admin');
        $user_id = $data->id;
        
        $item_id = Item::where('user_id', $user_id)->get('user_id');
        $count = Item::where('user_id', $user_id)->exists();

        if ($count) {
            Items_results::where('item_id', $item_id)->delete();
            Items_summary::where('item_id', $item_id)->delete();
            Item_detail::where('item_id', $item_id)->delete();
            Item::where('id', $item_id)->delete();
        }

        User::where('id', $user_id)->delete();

        return redirect('/user-list')->with('success', 'Akun Berhasil Dihapus');
    }
}
