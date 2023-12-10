<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function redirect()
    {
        return back();
    }

    public function calculate(Request $request)
    {
        $validatedData = $request->validate([
            'bahan_baku' => 'required|string|max:255',
            'total_penggunaan_tahunan' => 'required|numeric',
            'biaya_pemesanan' => 'required|numeric',
            'biaya_penyimpanan' => 'required|numeric',
            'max_penggunaan_tahunan' => 'required|numeric',
            'average_pengguanaan_tahunan' => 'required|numeric',
        ]);

        $validatedData['user_id'] = 1;

        $bahanBaku = $request->bahan_baku;
        $penggunaanTotal = $request->total_penggunaan_tahunan;
        $biayaPemesanan = $request->biaya_pemesanan;
        $biayaPerUnit = $request->biaya_penyimpanan;
        $penggunaanMax = $request->max_penggunaan_tahunan;
        $penggunaanAverage = $request->average_pengguanaan_tahunan;

        $totalEoq = sqrt(2 * $penggunaanTotal * $biayaPemesanan / $biayaPerUnit);
        $frekuensi = $penggunaanTotal / $totalEoq;
        $safetyStock = $this->safety_stock($penggunaanMax, $penggunaanAverage);
        $reorderPoint = $this->reorder_point($penggunaanAverage, $safetyStock);

        $prouduct = [
            'eoq' => $totalEoq,
            'rop' => $reorderPoint,
            'safety_stock' => $safetyStock
        ];

        $prouduct['product_id'] = '';

        

        return view('blankpage', [
            'active' => 'blankpage'
        ]);
    }

    public function safety_stock($penggunaanMax, $penggunaanAverage)
    {
        $leadtime = 3;

        return ($penggunaanMax - $penggunaanAverage) * $leadtime;
    }

    public function reorder_point($penggunaanAverage, $safetyStock)
    {
        $leadtime = 3;
        $waktu = $penggunaanAverage / 30;

        return $leadtime * $waktu + $safetyStock;
    }
}
