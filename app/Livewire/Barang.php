<?php

namespace App\Livewire;

use App\Models\TblBarang;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Barang extends Component
{
    use WithFileUploads, WithPagination;
    public $nama_product, $image, $description, $discount, $harga_diskon, $harga;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $barang_id;
    public $cari; 
    public $sortcolom ='nama_product'; 
    public $sortdirection = 'asc';
    
    public function show_detail($id)
    {
        
        $barang = TblBarang::where('id', $id)->first();

        $this->nama_product = $barang->nama_product;
        $this->image = $barang->nama_image;
        $this->description = $barang->description;
        $this->discount = $barang->discount;
        $this->harga_diskon = $barang->harga_diskon;
        $this->harga = $barang->harga;
        
        $this->updatedata = true;
        $this->barang_id = $id;
       
    }
    public function clear()
    {
        $this->nama_product = '';
        $this->description = '';
        $this->image = '';
        $this->discount = '';
        $this->harga_diskon = '';
        $this->harga = '';
       

    }


    public function simpan()
    {
        $rules = [
            'nama_product' => 'required',
            'image' => 'nullable|image|max:2048',// 1MB Max
            'discount' => 'required',
            'harga_diskon' => 'nullable|numeric',
            'harga' => 'nullable|numeric',
        ];
        $messages = [
            'nama_product.required' => 'Nama Barang tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'discount.required' => 'Diskon tidak boleh kosong',
            'harga_diskon.numeric' => 'Harga diskon harus berupa angka',
            'harga.numeric' => 'Harga harus berupa angka',
        ];
        $validated = $this->validate($rules, $messages);

        // Pastikan harga_diskon bernilai null jika kosong atau bukan angka
        //$harga_diskon = is_numeric($this->harga_diskon) ? $this->harga_diskon : null;
        //$harga = is_numeric($this->harga) ? $this->harga : null;

        // Simpan data ke database
        $data = [
            'nama_product' => $this->nama_product,
            'description' => $this->description,
            'discount' => $this->discount,
            'harga_diskon' => $this->harga_diskon,
            'harga' => $this->harga,
        ];

        // Cek apakah ada gambar yang diupload
        if ($this->image != null) {
            $data['image'] = $this->image->store('barang', 'public');
        } else {
            $data['image'] = null; // atau bisa dihapus jika tidak ingin menyimpan key 'gambar' sama sekali
        }

        // Simpan ke database
        TblBarang::create($data);
        session()->flash('message', 'Data Barang berhasil disimpan.');
        $this->clear();
        // Initialization code can go here
    }

    public function edit($id)
    {
        
        
        $barang = TblBarang::where('id', $id)->first();

        $this->nama_product = $barang->nama_product;
        $this->image = $barang->image;
        $this->description = $barang->description;
        $this->discount = $barang->discount;
        $this->harga_diskon = $barang->harga_diskon;
        $this->harga = $barang->harga;
        
        $this->updatedata = true;
        $this->barang_id = $id;
        
        
    }

    public function update()
    {
        $rules = [
            'nama_product' => 'required',
            'image' => 'nullable|image|max:2048', // 1MB Max
            'harga_diskon' => 'nullable|numeric',
            'harga' => 'nullable|numeric',
        ];
        $messages = [
            'nama_product.required' => 'Nama Barang tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'harga_diskon.numeric' => 'Harga diskon harus berupa angka',
            'harga.numeric' => 'Harga harus berupa angka',
        ];
        $validated = $this->validate($rules, $messages);

        $barang = TblBarang::find($this->barang_id);

        // Pastikan harga_diskon bernilai null jika kosong atau bukan angka
        $harga_diskon = is_numeric($this->harga_diskon) ? $this->harga_diskon : null;
        $harga = is_numeric($this->harga) ? $this->harga : null;

        // Simpan gambar jika ada upload baru
        if ($this->image) {
            $path = $this->image->store('barang','public'); // Simpan di storage/app/barang
            $barang->image = $path;
        }

        // Update field lainnya
        $barang->nama_product = $this->nama_product;
        $barang->description = $this->description;
        $barang->discount = $this->discount;
        $barang->harga_diskon = $harga_diskon;
        $barang->harga = $harga;
        $barang->save();

        session()->flash('message', 'Data Barang berhasil diupdate.');
        $this->clear();
    }

    public function hapus()
    {
        
        $id = $this->barang_id;
        $barang = TblBarang::where('id', $id)->first();
        if ($barang) {
            
            // Hapus gambar dari storage
            $gambarPath = storage_path('app/public' . $barang->image);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
            // Hapus data dari database
            $barang->delete();
            session()->flash('message', 'Data Barang berhasil dihapus.');
        } else {
            session()->flash('message', 'Data Barang tidak ditemukan.');
        }

        $this->clear();
    }

    public function konfimasihapus($id)
    {
        
        $this->barang_id = $id;
    }

    public function sort($colomname){
        
        $this->sortcolom = $colomname;
        //dump($this->sortcolom);
        $this->sortdirection = $this->sortdirection == 'asc' ? 'desc' : 'asc';
        //dd($this->sortdirection);
        
    }

    public function render()
    {
        if ($this->cari != null) {
            $dtbarang = TblBarang::where('nama_product', 'like', '%' . $this->cari . '%')
            ->orderBy($this->sortcolom, $this->sortdirection)->paginate(5);
            
        } else {
            $dtbarang = TblBarang::orderBy($this->sortcolom, $this->sortdirection)->paginate(5);
            
        }

        //dd($dtbarang);
        
        return view('livewire.barang',['dtbarang' => $dtbarang]);
    }
}