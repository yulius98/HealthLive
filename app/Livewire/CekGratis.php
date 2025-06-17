<?php

namespace App\Livewire;

use App\Models\TblAssesment;
use Livewire\Component;
use Livewire\WithPagination;


class CekGratis extends Component
{
    use WithPagination;
    public $kode_assesment, $nama_pelanggan, $no_hp, $berat_badan, $tinggi_badan, $aktivitas, $alergi, $hasil;
    
    protected $paginationTheme = 'bootstrap';
    public $cekgratis_id;
    
    public $cari; 
    public $sortcolom ='nama_pelanggan'; 
    public $sortdirection = 'asc';

    public function clear()
    {
        $this->kode_assesment = '';
        $this->nama_pelanggan = '';
        $this->no_hp = '';
        $this->berat_badan = '';
        $this->tinggi_badan = '';
        $this->aktivitas = '';
        $this->alergi = '';
    }
    
    public function edit($id){
        $cekgratis = TblAssesment::where('id', $id)->first();
        $this->kode_assesment = $cekgratis->kode_assesment;
        $this->nama_pelanggan = $cekgratis->nama_pelanggan;
        $this->no_hp = $cekgratis->no_hp;
        $this->berat_badan = $cekgratis->berat_badan;
        $this->tinggi_badan = $cekgratis->tinggi_badan;
        $this->aktivitas = $cekgratis->aktivitas;
        $this->alergi = $cekgratis->alergi;

        $this->cekgratis_id = $id;
    }

    public function hitung(){
        $cekgratis = TblAssesment::find($this->cekgratis_id);
        //$cekgratis->kode_assesment = $this->kode_assesment;
        //$cekgratis->nama_pelanggan = $this->nama_pelanggan;
        //$cekgratis->no_hp = $this->no_hp;
        //$cekgratis->berat_badan = $this->berat_badan;
        //$cekgratis->tinggi_badan = $this->tinggi_badan;
        //$cekgratis->aktivitas = $this->aktivitas;
        //$cekgratis->alergi = $this->alergi;
        
        //hitung hasil
        $tinggi_meter = $this->tinggi_badan / 100;
        $bmi = $this->berat_badan / ($tinggi_meter * $tinggi_meter);
        
        // Adjust BMI based on activity level
        if ($this->aktivitas == 'jarang'){
            $bmi -= 0.5; 
        } elseif ($this->aktivitas == 'aktif'){
            $bmi +=  0.5; 
        }
        
        
        if ($bmi < 18.5) {
            $cekgratis->hasil = 'underweight';
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $cekgratis->hasil = 'normal';
        } else {
            $cekgratis->hasil = 'overweight';
        }
        
        $cekgratis->status = 'selesai';
         // Set status to selesai after calculation
        $cekgratis->save();
        session()->flash('message', 'Data berhasil diupdate dan hasil telah dihitung.');

        //tampilkan hasil
        $cekgratis = TblAssesment::find($this->cekgratis_id);
        //dd($cekgratis);
        $this->kode_assesment = $cekgratis->kode_assesment;
        $this->nama_pelanggan = $cekgratis->nama_pelanggan;
        $this->no_hp = $cekgratis->no_hp;
        $this->berat_badan = $cekgratis->berat_badan;
        $this->tinggi_badan = $cekgratis->tinggi_badan;
        $this->aktivitas = $cekgratis->aktivitas;
        $this->alergi = $cekgratis->alergi;
        $this->hasil = $cekgratis->hasil;
        
    }

    

    public function render()
    {
        $dtassesments = TblAssesment::paginate(10);
            
        return view('livewire.cek-gratis',['dtassesment' => $dtassesments]);
    }
}