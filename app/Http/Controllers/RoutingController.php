<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Product;
use App\Models\Calculate;
use App\Models\Item_detail;
use App\Models\Items_results;
use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function index()
    {
        return back();
    }

    public function homePage()
    {
        return view('homepage', [
            'active' => 'homepage'
        ]);
    }
    public function userProfile()
    {
        $user = User::find(auth()->user()->id);

        return view('user-profile.profile', [
        'active' => 'profile',
            'response' => $user
        ]);
    }

    public function inputData()
    {
        return view('input.index', [
            'active' => 'input'
        ]);
    }

    public function userPage()
    {
        $this->authorize('admin');
        return view('user-list.user', [
            'active' => 'user',
            'responses' => User::all()
        ]);
    }

    public function showData()
    {
        $user = User::find(auth()->user()->id);
        $items = $user->items;
        return view('perhitungan.listdata', [
            'active' => 'listdata',
            'responses' => $items,
        ]);
    }

    public function listData(Item $data)
    {
        $items = Items_results::where('item_id', $data->id)->latest()->first();
        // dd($items);
        return view('perhitungan.details', [
            'active' => 'listdata',
            'response' => $items,
            'item' => $data,
        ]);
    }

    public function rekapan()
    {
        $user = User::find(auth()->user()->id);
        $data = $user->items;
        return view('rekapan.index', [
            'active' => 'rekap',
            'responses' => $data
        ]);
    }

    public function details(Item $data)
    {
        $cobain = Item_detail::where('item_id', $data->id)
            ->whereNotNull('jumlah_pembelian')
            ->whereNotNull('jumlah_penggunaan')
            ->whereNotNull('biaya_pemesanan')
            ->whereNotNull('biaya_penyimpanan')
            ->whereNotNull('leadtime')
            ->get();

        $data_terisi = Item_detail::where('item_id', $data->id)
            ->whereNotNull('jumlah_pembelian')
            ->whereNotNull('jumlah_penggunaan')
            ->whereNotNull('biaya_pemesanan')
            ->whereNotNull('biaya_penyimpanan')
            ->whereNotNull('leadtime')
            ->count();
        // dd($data, $cobain);
        $hasil = $data->items_details;
        return view('rekapan.details', [
            'active' => 'rekap',
            'responses' => $cobain,
            'data_item' => $data,
            'data_terisi' => $data_terisi
        ]);
    }
}
