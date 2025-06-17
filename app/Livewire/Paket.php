<?php

namespace App\Livewire;

use App\Models\TblPaket;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Paket extends Component
{
    use WithFileUploads, WithPagination;
    public $nama_paket, $deskripsi, $harga, $panduan_paket, $video_panduan;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $paket_id;
    public $cari; 
    public $sortcolom ='nama_product'; 
    public $sortdirection = 'asc';

    public function show_detail($id)
    {
        
        $paket = TblPaket::where('id', $id)->first();

        $this->nama_paket = $paket->nama_paket;
        $this->deskripsi = $paket->deskripsi;
        $this->harga = $paket->harga;
        $this->panduan_paket = $paket->panduan_paket;
        $this->video_panduan = $paket->video_panduan;
        
        $this->updatedata = true;
        $this->paket_id = $id;
       
    }
    public function clear()
    {
        $this->nama_paket = '';
        $this->deskripsi = '';
        $this->harga = '';
        $this->panduan_paket = '';
        $this->video_panduan = '';
       
    }


    public function simpan()
    {
        $rules = [
            'nama_paket' => 'required',
            
        ];
        $messages = [
            'nama_paket.required' => 'Nama Paket tidak boleh kosong',
                    ];
        $validated = $this->validate($rules, $messages);

        

        // Simpan data ke database
        $data = [
            'nama_paket' => $this->nama_paket,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            
        ];

        // Cek apakah ada panduan yang diupload
        if ($this->panduan_paket != null) {
            $data['panduan_paket'] = $this->panduan_paket->store('panduan', 'public');
        } else {
            $data['panduan_paket'] = null; // atau bisa dihapus jika tidak ingin menyimpan key 'panduan' sama sekali
        }

        // Cek apakah ada video yang diupload
        if ($this->video_panduan != null) {
            $data['video_panduan'] = $this->video_panduan->store('video', 'public');
        } else {
            $data['video_panduan'] = null; // atau bisa dihapus jika tidak ingin menyimpan key 'gambar' sama sekali
        }

        // Simpan ke database
        TblPaket::create($data);
        session()->flash('message', 'Data Paket berhasil disimpan.');
        $this->clear();
        // Initialization code can go here
    }

    public function edit($id)
    {
        
        $paket = TblPaket::where('id', $id)->first();
        $this->nama_paket = $paket->nama_paket;
        $this->deskripsi = $paket->deskripsi;
        $this->harga = $paket->harga;
        $this->panduan_paket = $paket->panduan_paket;
        $this->video_panduan = $paket->video_panduan;
        $this->updatedata = true;
        $this->paket_id = $id;
    }

        

    public function update()
    {
        $rules = [
            'nama_paket' => 'required',
            
        ];
        $messages = [
            'nama_product.required' => 'Nama Barang tidak boleh kosong',
            
        ];
        $validated = $this->validate($rules, $messages);

        
        $paket = TblPaket::where('id', $this->paket_id)->first();
        
        // Simpan panduan dan video jika ada upload baru
        if ($this->video_panduan) {
            $path = $this->video_panduan->store('video','public'); // Simpan di storage/app/video
            $paket->video_panduan = $path;
        }

        if ($this->panduan_paket) {
            $path = $this->panduan_paket->store('panduan','public'); // Simpan di storage/app/panduan
            $paket->panduan_paket = $path;
        }

        // Update field lainnya
        $paket->nama_paket = $this->nama_paket;
        $paket->deskripsi = $this->deskripsi;
        $paket->harga = $this->harga;
        $paket->save();
        

        session()->flash('message', 'Data Paket berhasil diupdate.');
        $this->clear();
    }

    public function hapus()
    {
        
        $id = $this->paket_id;
        $paket = TblPaket::where('id', $id)->first();
        
        if ($paket) {
            // Hapus panduan dan video dari storage jika ada
            $panduanPaketPath = storage_path('app/public' . $paket->panduan_paket);
            if (file_exists($panduanPaketPath)) {
                unlink($panduanPaketPath);
            }

            $videoPanduanPath = storage_path('app/public' . $paket->video_panduan);
            if (file_exists($videoPanduanPath)) {
                unlink($videoPanduanPath);
            }


            // Hapus data dari database
            $paket->delete();
            session()->flash('message', 'Data Paket berhasil dihapus.');
        } else {
            session()->flash('message', 'Data Paket tidak ditemukan.');
        }

        $this->clear();
    }

    public function konfimasihapus($id)
    {
        
        $this->paket_id = $id;
    }

    public function sort($colomname){
        
        $this->sortcolom = $colomname;
        //dump($this->sortcolom);
        $this->sortdirection = $this->sortdirection == 'asc' ? 'desc' : 'asc';
        //dd($this->sortdirection);
        
    }
    public function render()
    {
        $dtpaket = TblPaket::paginate(10);
        return view('livewire.paket',['dtpaket' => $dtpaket ]);
    }
}