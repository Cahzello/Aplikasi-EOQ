<?php

namespace App\Http\Controllers;

use App\Models\Calculate;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function redirect()
    {
        return back();
    }

    public function product(Request $request)
    {
        $validatedData = $request->validate([
            'bahan_baku' => 'required|string|max:255',
            'total_penggunaan_tahunan' => 'required|numeric',
            'biaya_pemesanan' => 'required|numeric',
            'biaya_penyimpanan' => 'required|numeric',
            'max_penggunaan_tahunan' => 'required|numeric',
            'average_penggunaan_tahunan' => 'required|numeric',
        ]);

        $validatedData['user_id'] = User::find(1)->id;  

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

        $product_data = Product::create($validatedData);

        $data = [
            'bahan_baku' => $bahanBaku,
            'eoq' => $totalEoq,
            'rop' => $reorderPoint,
            'safety_stock' => $safetyStock,
            'frekuensi' => $frekuensi
        ];

        $data['product_id'] = $product_data->id;

        Calculate::create($data);

        return redirect('/data')->with('success', 'data berhasil di input');
    }

    public function safety_stock($penggunaanMax, $penggunaanAverage)
    {
        $leadtime = 3;

        $hasil_sementara =  ($penggunaanMax - $penggunaanAverage) * $leadtime;

        return $hasil_sementara;
    }

    public function reorder_point($penggunaanAverage, $safetyStock)
    {
        $leadtime = 3;
        $waktu = $penggunaanAverage / 30;

        $hasil_sementara = ($leadtime * $waktu) + $safetyStock;

        return $hasil_sementara;
    }
}
