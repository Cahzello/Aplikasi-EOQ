<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EoqController extends Controller
{

    public function calculate (Request $request){
        $bahanBaku = $request->bahanBaku;
        $penggunaan = $request->penggunaan;
        $biayaPemesanan = $request->biayaPemesanan;
        $biayaPerUnit = $request->biayaPerUnit;

        $totalEoq = sqrt(2 * $penggunaan * $biayaPemesanan / $biayaPerUnit);
        $frekuensi = $penggunaan / $totalEoq;

        $hasil = [
            'namaBahanBaku' => $bahanBaku,
            'totalEOQ'=> intval($totalEoq),
            'frekuensi' => intval($frekuensi)
        ];

        return view('blankpage', [
            'active' => 'blankpage',
            'response' => $hasil
        ]);
    }
}
