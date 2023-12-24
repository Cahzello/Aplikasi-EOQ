<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_detail;
use Illuminate\Http\Request;

class RekapanController extends Controller
{

    public function view_store(Item_detail $data_item)
    {

        $bulan = Item_detail::where('item_id', $data_item->item_id)
            ->select('bulan')
            ->whereNull('jumlah_pembelian')
            ->whereNull('jumlah_penggunaan')
            ->whereNull('biaya_pemesanan')
            ->whereNull('biaya_penyimpanan')
            ->whereNull('leadtime')
            ->get();

        return view('rekapan.store', [
            'active' => 'rekap',
            'months' => $bulan,
            'data_item' => $data_item
        ]);
    }

    public function store(Request $request, Item_detail $data_item)
    {
        $validatedRequest = $request->validate([
            'bulan' => 'required|max:255',
            'jumlah_pembelian' => 'required|max:255|numeric',
            'jumlah_penggunaan' => 'required|max:255|numeric',
            'biaya_pemesanan' => 'required|max:255|numeric',
            'biaya_penyimpanan' => 'required|max:255|numeric',
            'leadtime' => 'required|max:255|numeric',
        ]);

        $item_id = $data_item->item_id;
        $bulan = $validatedRequest['bulan'];

        if ($validatedRequest['bulan'] === 'notSelected') {
            return redirect('/rekapan-bulanan/create/' . $item_id)->withErrors('Pilih Bulan!');
        }

        Item_detail::where('bulan', $bulan)->update($validatedRequest);

        return redirect('/rekapan-bulanan/data/' . $item_id)->with('success', 'Data berhasil diisi.');
    }

    public function view_edit(Item_detail $record)
    {
        return view('rekapan.edit', [
            'active' => 'rekap',
            'response' => $record,
        ]);
    }

    public function edit(Request $request, Item_detail $record)
    {
        $validatedRequest = $request->validate([
            'jumlah_pembelian' => 'required|max:255|numeric',
            'jumlah_penggunaan' => 'required|max:255|numeric',
            'biaya_pemesanan' => 'required|max:255|numeric',
            'biaya_penyimpanan' => 'required|max:255|numeric',
            'leadtime' => 'required|max:255|numeric',
        ]);
        $bulan = $record->bulan;

        $item_id = $record->item_id;
        
        Item_detail::where('bulan', $bulan)->update($validatedRequest);

        return redirect('/rekapan-bulanan/data/' . $item_id)->with('success', 'Data berhasil diubah.');
    }
}
