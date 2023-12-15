<?php

namespace App\Http\Controllers;

use App\Models\Calculate;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PHPUnit\Event\Test\PrintedUnexpectedOutput;

class ProductController extends Controller
{
    public function redirect()
    {
        return back();
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bahan_baku' => 'required|string|max:255',
            'total_penggunaan_tahunan' => 'required|numeric',
            'biaya_pemesanan' => 'required|numeric',
            'biaya_penyimpanan' => 'required|numeric',
            'max_penggunaan_tahunan' => 'required|numeric',
            'average_penggunaan_tahunan' => 'required|numeric',
        ]);
        $user_id = auth()->user()->id;

        $validatedData['user_id'] = $user_id;

        $arr = $this->calculation($request);

        $product_data = Product::create($validatedData);

        $arr['product_id'] = $product_data->id;

        Calculate::create($arr);

        return redirect('/data')->with('success', 'data berhasil di input');
    }


    public function calculation($request)
    {
        $bahanBaku = $request->bahan_baku;
        $penggunaanTotal = $request->total_penggunaan_tahunan;
        $biayaPemesanan = $request->biaya_pemesanan;
        $biayaPerUnit = $request->biaya_penyimpanan;
        $penggunaanMax = $request->max_penggunaan_tahunan;
        $penggunaanAverage = $request->average_penggunaan_tahunan;

        $totalEoq = sqrt(2 * $penggunaanTotal * $biayaPemesanan / $biayaPerUnit);
        $frekuensi = $penggunaanTotal / $totalEoq;
        $safetyStock = $this->safety_stock($penggunaanMax, $penggunaanAverage);
        $reorderPoint = $this->reorder_point($penggunaanAverage, $safetyStock);

        $arr = [
            'bahan_baku' => $bahanBaku,
            'eoq' => intval($totalEoq),
            'rop' => $reorderPoint,
            'safety_stock' => $safetyStock,
            'frekuensi' => intval($frekuensi)
        ];

        return $arr;
    }

    public function safety_stock($penggunaanMax, $penggunaanAverage)
    {
        $leadtime = 3;

        $hasil_sementara =  $penggunaanMax - $penggunaanAverage;
        // dd($hasil_sementara);
        $hasil = $hasil_sementara * $leadtime;
        dd($hasil);
        
        return $hasil;
    }

    public function reorder_point($penggunaanAverage, $safetyStock)
    {
        $leadtime = 3;
        $waktu = $penggunaanAverage / 30;

        $hasil_sementara = ($leadtime * $waktu) + $safetyStock;

        return $hasil_sementara;
    }

    public function update(Request $request, Product $data)
    {
        $validatedData = $request->validate([
            'bahan_baku' => 'required|string|max:255',
            'total_penggunaan_tahunan' => 'required|numeric',
            'biaya_pemesanan' => 'required|numeric',
            'biaya_penyimpanan' => 'required|numeric',
            'max_penggunaan_tahunan' => 'required|numeric',
            'average_penggunaan_tahunan' => 'required|numeric',
        ]);

        $validatedData['user_id'] = $data->user_id;

        $arr = $this->calculation($request);

        Product::where('id', $data->id)->update($validatedData);

        Calculate::where('product_id', $data->id)->update($arr);

        return redirect('/data')->with('success', 'Data telah berhasil diubah');
    }

    public function delete(Product $data)
    {
        Product::where('id', $data->id)->delete();
        Calculate::where('product_id', $data->id)->delete();

        return redirect('/data')->with('success', 'Data telah berhasil dihapus');
    }
}
