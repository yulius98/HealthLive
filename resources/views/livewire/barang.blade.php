@php use Illuminate\Support\Facades\Storage; @endphp

<div class="container">
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>    
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="pt-3">
            <div id="flash-message"  class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
        
    @endif


        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded ">
            
            <form>
                <div class="row">
                    <!-- Kolom Pertama -->
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Produk*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_product" wire:model="nama_product">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-3 col-form-label">Harga*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga" wire:model="harga">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="discount" class="col-sm-3 col-form-label">Discount*</label>
                            <div class="col-sm-9">
                               <select wire:model="discount" id="discount" name="discount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#723322] focus:ring-[#723322]">
                                    <option value="no"></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga_diskon" class="col-sm-3 col-form-label">Harga Discount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga_diskon" wire:model="harga_diskon">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" wire:model="description">
                            </div>
                        </div>
                        <div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input 
                                        type="file" 
                                        class="form-control @error('image') is-invalid @enderror" 
                                        id="image" 
                                        wire:model="image" 
                                        accept=".jpg,.jpeg,.png"
                                        onchange="document.getElementById('label-gambar').innerText = this.files[0]?.name || 'Pilih gambar';"
                                    >
                                    <small id="label-gambar" class="form-text text-muted">Pilih gambar</small>
                                    @error('image') 
                                        <span class="invalid-feedback d-block">{{ $message }}</span> 
                                    @enderror
                                    
                                    {{-- Preview Gambar --}}
                                    @if ($image instanceof \Illuminate\Http\UploadedFile)
                                        <div class="mt-3">
                                            <img src="{{ $image->temporaryUrl() }}" alt="Preview Image" class="img-thumbnail object-contain rounded" style="max-height: 100px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
        
                    
                </div>
        
                <!-- Tombol SIMPAN -->
                <div class="mb-3 row">
                    <div class="col-12 text-end">
                        @if ($updatedata == false)
                            <button type="button" class="btn btn-primary" name="submit" wire:click="simpan()">SIMPAN</button>
                        @else
                            <button type="button" class="btn btn-primary" name="submit" wire:click="update()">UPDATE</button>    
                        @endif
                        <button type="button" class="btn btn-secondary" name="submit" wire:click="clear()">Clear</button>    
                        
                    </div>
                </div>
            </form>
        </div>
        
        <!-- AKHIR FORM -->

        <!-- START DATA -->
        
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h4 class="font-medium">Data Barang</h4>
            <div class="pb-3 pt-3">
                <input type="text" class="form-control mb-3 w-25" placeholder="Search..." wire:model.live="cari">
            </div>
            {{ $dtbarang->links() }}
            <table class="table table-striped table-sortable ">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4 sort" @if ($sortcolom == 'nama_product') {{ $sortdirection }} @endif wire:click="sort('nama_product')">Nama Barang</th>
                        <th class="col-md-2 sort" >Harga</th>
                        <th class="col-md-2 sort" >Discount</th>
                        <th class="col-md-2 sort" >Harga Diskon</th>
                        <th class="col-md-2 sort" >Keterangan</th>
                        <th class="col-md-2 sort" >Gambar</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($dtbarang as $key => $value)
                    <tr>
                        <td>{{ $dtbarang->firstItem() + $key }}</td>
                        <td>{{ $value->nama_product  }}</td>
                        <td>{{ $value->harga }}</td>
                        <td>{{ $value->discount }}</td>
                        <td>{{ $value->harga_diskon }}</td>
                        <td>{{ $value->description }}</td>
                        <td><img src="{{ asset('storage/'.$value->image) }}" alt="Gambar Barang" class="p-0.5 object-contain rounded" 
                                    style="width: 60px; height: 60px;"></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a wire:click="show_detail({{ $value->id }})" class="btn btn-warning btn-sm">Detail</a>
                                <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                                <a wire:click="konfimasihapus({{ $value->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
        <!-- AKHIR DATA -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                  <button type="button" class="btn btn-primary" wire:click="hapus()" data-bs-dismiss="modal">YA</button>
                </div>
              </div>
            </div>
        </div>
</div>


