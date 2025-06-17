<?php

namespace App\Http\Controllers;

use App\Models\TblAssesment;
use Illuminate\Http\Request;


class CekGratisController extends Controller
{
    /**
     * Store a newly created assessment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request): \Illuminate\View\View
    {
        $validated = $request->validate([
            'registrationNumber' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'aktifitas' => 'nullable|string|max:255',
            'alergi' => 'nullable|string|max:255',
        ]);

        $penilaian = new TblAssesment();
        $penilaian->kode_assesment = $validated['registrationNumber'];
        $penilaian->nama_pelanggan = $validated['nama'];
        $penilaian->no_hp = $validated['no_hp'];
        $penilaian->berat_badan = $validated['berat_badan'];
        $penilaian->tinggi_badan = $validated['tinggi_badan'];
        $penilaian->aktivitas = $validated['aktifitas'] ?? null;
        $penilaian->alergi = $validated['alergi'] ?? null;
        $penilaian->hasil = null;
        $penilaian->status = 'pending';
        $penilaian->save();

        return view('MintaHasil', ['noreg' => $validated['registrationNumber']]);
    }
}