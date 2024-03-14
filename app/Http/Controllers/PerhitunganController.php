<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_detail;
use App\Models\Items_results;
use App\Models\Items_summary;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function redirect()
    {
        return back();
    }

    public function store(Item $data)
    {
        $item_id = $data->id;


        $data_terisi = Item_detail::where('item_id', $data->id)
            ->whereNotNull('jumlah_pembelian')
            ->whereNotNull('jumlah_penggunaan')
            ->whereNotNull('biaya_pemesanan')
            ->whereNotNull('biaya_penyimpanan')
            ->whereNotNull('leadtime')
            ->count();

        if($data_terisi < 12){
            return redirect('/rekapan-bulanan/data/' . $item_id)
            ->withErrors('Isi dulu datanya terlebih dahulu hingga semua bulan terpenuhi');
        }

        $total = Item_detail::where('item_id', $item_id)->sum('jumlah_penggunaan');
        $max  = Item_detail::where('item_id', $item_id)->max('jumlah_penggunaan');
        $avg  = Item_detail::where('item_id', $item_id)->avg('jumlah_penggunaan');
        $pembelian_avg  = Item_detail::where('item_id', $item_id)->avg('jumlah_pembelian');
        $biayaPemesanan  = Item_detail::where('item_id', $item_id)->sum('biaya_pemesanan');
        $biayaPenyimpanan = Item_detail::where('item_id', $item_id)->sum('biaya_penyimpanan');
        $leadtime = Item_detail::where('item_id', $item_id)->sum('leadtime');
        $arr = [
            'item_id'=> $item_id,
            'total_penggunaan_tahunan' => $total,
            'max_penggunaan_tahunan' => $max,
            'average_penggunaan_tahunan' => $avg,
            'biaya_pemesanan' => $biayaPemesanan,
            'biaya_penyimpanan' => $biayaPenyimpanan,
            'leadtime' => $leadtime,
        ];
                
        $status_item_summary = Items_summary::where('item_id', $data->id)->exists();
        if($status_item_summary){
           $item = Items_summary::where('item_id', $data->id)->update($arr);
        } else {
            $item = Items_summary::create($arr);
        }

        if(gettype($item) == 'integer'){
            $item_summaries_id = $item;
        } else {
            $item_summaries_id = $item->id;
        }

        $item_result = $this->calculation($arr);
        $item_result['item_id'] = $data->id;
        $item_result['item_summaries_id'] = $item_summaries_id;
        $item_result['average_pembelian'] = $pembelian_avg;

        $status_item_results = Items_results::where('item_id', $data->id)->exists();
        if($status_item_results){
            Items_results::where('item_id', $data->id)->update($item_result);
            $message = 'data berhasil diupdate.';
        } else {
            Items_results::create($item_result);
            $message = 'data berhasil dibuat.';

        }


        return redirect('/data/' . $item_id)->with('success', $message);
    }


    public function calculation($request)
    {
        $penggunaanTotal = $request['total_penggunaan_tahunan'];
        $biayaPemesanan = round($request['biaya_pemesanan']);
        $biayaPerUnit = round($request['biaya_penyimpanan']);
        $penggunaanMax = $request['max_penggunaan_tahunan'];
        $penggunaanAverage = $request['average_penggunaan_tahunan'];
        $leadtime = $request['leadtime'];
        $frekuensi_konvensional = 12;

        $totalEoq = sqrt(2 * $penggunaanTotal * $biayaPemesanan / $biayaPerUnit);
        $frekuensi = $penggunaanTotal / $totalEoq;
        $safetyStock = $this->safety_stock($penggunaanMax, $penggunaanAverage, $leadtime);
        $reorderPoint = $this->reorder_point($penggunaanAverage, $safetyStock, $leadtime);


        $arr = [
            'eoq' => round($totalEoq),
            'rop' => $reorderPoint,
            'safety_stock' => $safetyStock,
            'frekuensi' => round($frekuensi),
            'frekuensi_konvensional' => $frekuensi_konvensional,
        ];

        return $arr;
    }

    public function safety_stock($penggunaanMax, $penggunaanAverage, $leadtime)
    {

        $hasil_sementara =  $penggunaanMax - $penggunaanAverage;
        $hasil = $hasil_sementara * $leadtime;
        
        return $hasil;
    }

    public function reorder_point($penggunaanAverage, $safetyStock, $leadtime)
    {
        $waktu = round($penggunaanAverage) / 30;

        $hasil_sementara = ($leadtime * $waktu) + $safetyStock;

        return $hasil_sementara;
    }


    public function delete(Item $item)
    {      
        Items_results::where('item_id', $item->id)->delete();

        return redirect('/data')->with('success', 'Data telah berhasil dihapus');
    }
}
