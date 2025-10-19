<?php

namespace App\Livewire;

use App\Models\TblPaket;
use App\Models\TblProgramPelanggan;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class RegProgPelanggan extends Component
{
    use WithPagination;
    public $nama_pelanggan, $nama_paket, $id_pelanggan, $id_paket;
    
    protected $paginationTheme = 'bootstrap';
    public $paketpelanggan_id;
    
    public $cari; 
    public $sortcolom ='nama_pelanggan'; 
    public $sortdirection = 'asc';

    public function edit_pelanggan($id)
    {
        $this->id_pelanggan = $id;
        $pelanggan = User::find($id);
        $this->nama_pelanggan = $pelanggan->nama;
    }

    public function clear()
    {
        
        $this->nama_pelanggan = '';
        $this->nama_paket = '';
    }

    public function edit($id)
    {
        $paketpelanggan = TblProgramPelanggan::join('tbl_pakets as paket', 'paket.id', '=', 'tbl_program_pelanggans.id_paket')
            ->join('users as pelanggan', 'pelanggan.id', '=', 'tbl_program_pelanggans.id_pelanggan')
            ->select('tbl_program_pelanggans.*', 'paket.*', 'pelanggan.*')
            ->where('tbl_program_pelanggans.id', $id)
            ->get();
            
        $this->nama_pelanggan = $paketpelanggan->nama_pelanggan;
        $this->nama_paket = $paketpelanggan->nama_paket;

        $this->paketpelanggan_id = $id;
    }

    public function simpan()
    {
        
        $data = [
            'id_pelanggan' => $this->id_pelanggan,
            'id_paket' => $this->id_paket,

        ];
        
        TblProgramPelanggan::create($data);

        session()->flash('message', 'Data berhasil disimpan.');
        $this->clear();
    }

    public function selectPaket($id)
    {
        $paket = TblPaket::find($id);

        if ($paket) {
            $this->id_paket = $paket->id;
            $this->nama_paket = $paket->nama_paket;
        }
    }
    public function render()
    {
        $dtpaketpelanggan = TblProgramPelanggan::join('tbl_pakets as paket', 'paket.id', '=', 'tbl_program_pelanggans.id_paket')
            ->join('users as pelanggan', 'pelanggan.id', '=', 'tbl_program_pelanggans.id_pelanggan')
            ->select('tbl_program_pelanggans.*', 'paket.*', 'pelanggan.*')
            ->where('nama','like','%'.$this->cari.'%')
            ->paginate(10);
        //dd($dtpaketpelanggan);

        $dtpelanggan = User::doesntHave('programpelanggan')
            ->where('role', 'user')
            ->paginate(10);

        $dtpaket = TblPaket::all();    
        //dd($dtpaketpelanggan);
        return view('livewire.reg-prog-pelanggan',['dtpelanggan' => $dtpelanggan, 
                        'dtpaketpelanggan' => $dtpaketpelanggan,
                        'dtpaket' => $dtpaket]);
    }
}