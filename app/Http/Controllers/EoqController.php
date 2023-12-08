<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EoqController extends Controller
{

    public function redirect (){
        return back();
    }

    public function calculate (Request $request){
        $bahanBaku = $request->bahanBaku;
        $penggunaanTotal = $request->penggunaanTotal;
        $biayaPemesanan = $request->biayaPemesanan;
        $biayaPerUnit = $request->biayaPerUnit;

        $totalEoq = sqrt(2 * $penggunaanTotal * $biayaPemesanan / $biayaPerUnit);
        $frekuensi = $penggunaanTotal / $totalEoq;
        $safetyStock = $this->safety_stock($request);
        $reorderPoint = $this->reorder_point($request, $safetyStock);

        $hasil = [
            'namaBahanBaku' => $bahanBaku,
            'totalEOQ'=> intval($totalEoq),
            'frekuensi' => intval($frekuensi),
            'safety_stock' => $safetyStock,
            'reorder_point' => $reorderPoint
        ];

        return view('blankpage', [
            'active' => 'blankpage',
            'response' => $hasil
        ]);
    }

    public function safety_stock (Request $request){
        $penggunaanMax = $request->penggunaanMax;
        $penggunaanAverage = $request->penggunaanAverage;
        $leadtime = 3;

        return ($penggunaanMax - $penggunaanAverage) * $leadtime;

    }

    public function reorder_point (Request $request, $safetyStock){
        $leadtime = 3;
        $penggunaanAverage = $request->penggunaanAverage;
        $hasilSafetyStock = $safetyStock;
        $waktu = $penggunaanAverage / 30;

        return $leadtime * $waktu + $hasilSafetyStock;

    }
}
