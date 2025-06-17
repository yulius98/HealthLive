<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblProgramPelanggan;

class ProgramPelangganController extends Controller
{
    public function ProgPelangganShow($id): \Illuminate\View\View
    {
        
$dtprogpelanggan = TblProgramPelanggan::join('users','tbl_program_pelanggans.id_pelanggan','=','users.id')
    ->join('tbl_pakets','tbl_program_pelanggans.id_paket','=','tbl_pakets.id')
    ->select('tbl_program_pelanggans.*', 'users.*', 'tbl_pakets.*')
    ->where('tbl_program_pelanggans.id_pelanggan', '=',  $id)
    ->get();
        //dump($dtprogpelanggan);
            
        return view('dashboard_pelanggan', ['dtprogpelanggan' => $dtprogpelanggan]);
    }
}