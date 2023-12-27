<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_detail;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function view_edit(Item $item)
    {
        return view('bahanbaku.edit', [
            'active' => 'rekap',
            'response' => $item
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bahan_baku' => 'required|string|max:255',
        ]);

        $user_id = auth()->user()->id;
        $validatedData['user_id'] = $user_id;
        $bulan = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        $item = Item::create($validatedData);
        $arr = [];

        foreach ($bulan as $value){
            $arr['item_id'] = $item->id;
            $arr['bulan'] = $value;
            Item_detail::create($arr);
        }

        return redirect('/rekapan-bulanan')->with('success', 'data berhasil di input');
    }

    public function edit(Request $request, Item $item)
    {
        $validatedRequest = $request->validate([
            'bahan_baku' => 'required|max:255'
        ]);
        $item_id = $item->id;

        Item::where('id', $item_id)->update($validatedRequest);

        return redirect('/rekapan-bulanan/data/' . $item_id)->with('success', 'Nama bahan baku berhasil diubah.');

    }

    public function destroy(Item $item)
    {
        $item_id = $item->id;

        Item_detail::where('item_id', $item_id)->delete();
        Item::where('id', $item_id)->delete();

        return redirect('/rekapan-bulanan')->with('success', 'Data bahan baku berhasil dihapus.');
    }
}
