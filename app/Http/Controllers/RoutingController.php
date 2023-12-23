<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Product;
use App\Models\Calculate;
use App\Models\Item_detail;
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

        return view('profile', [
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
        return view('user', [
            'active' => 'user',
            'responses' => User::all()
        ]);
    }

    public function showData()
    {
        $user = User::find(auth()->user()->id);
        $products = $user->products;
        $calculates = $products->flatMap->calculates;

        return view('listdata', [
            'active' => 'listdata',
            'responses' => $calculates,
        ]);
    }

    public function listData(Calculate $data)
    {
        return view('details', [
            'active' => 'listdata',
            'response' => $data
        ]);
    }

    public function editPage(Product $data)
    {
        return view('editpage', [
            'active' => 'editpage',
            'response' => $data
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
        $cobain =Item_detail::where('item_id', $data->id)
            ->whereNotNull('jumlah_pembelian')
            ->whereNotNull('jumlah_penggunaan')
            ->whereNotNull('biaya_pemesanan')
            ->whereNotNull('biaya_penyimpanan')
            ->whereNotNull('leadtime')
            ->get();
        // dd($cobain);

        $hasil = $data->items_details;
        return view('rekapan.details', [
            'active' => 'rekap',
            'responses' => $cobain,
            'bahan_baku' => $data->bahan_baku
        ]);
    }
}
