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

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h4 class="font-medium">Data Cek Gratis</h4>
            <div class="pb-3 pt-3">
                <input type="text" class="form-control mb-3 w-25" placeholder="Search..." wire:model.live="cari">
            </div>

            <table class="table table-striped table-sortable ">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-2 sort" >Kode</th>
                        <th class="col-md-4 sort" @if ($sortcolom == 'nama_pelanggan') {{ $sortdirection }} @endif wire:click="sort('nama_pelanggan')">Nama Pelanggang</th>
                        <th class="col-md-2 sort" >No HP</th>
                        <th class="col-md-2 sort" >Berat Badan</th>
                        <th class="col-md-2 sort" >Tinggi Badan</th>
                        <th class="col-md-2 sort" >Aktivitas</th>
                        <th class="col-md-2 sort" >Alergi</th>
                        <th class="col-md-2 sort" >Hasil Cek Gratis</th>
                        <th class="col-md-2 sort" >Status</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($dtassesment as $key => $value)
                    <tr>
                        <td>{{ $dtassesment->firstItem() + $key }}</td>
                        <td>{{ $value->kode_assesment  }}</td>
                        <td>{{ $value->nama_pelanggan }}</td>
                        <td>{{ $value->no_hp }}</td>
                        <td>{{ $value->berat_badan }}</td>
                        <td>{{ $value->tinggi_badan }}</td>
                        <td>{{ $value->aktivitas }}</td>
                        <td>{{ $value->alergi }}</td>
                        <td>{{ $value->hasil }}</td>
                        <td>{{ $value->status }}</td>
                                               
                        <td>
                            <div class="d-flex gap-1">
                                <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Hitung</a>
                                <a wire:click="kirimhasil({{ $value->id }})" class="btn btn-warning btn-sm">Kirim</a>
                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
        <!-- AKHIR DATA -->
        
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded ">
            
            <form>
                <div class="row">
                    <!-- Kolom Pertama -->
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="kode_assesment" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kode_assesment" wire:model="kode_assesment" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama_pelanggan" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_pelanggan" wire:model="nama_pelanggan" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="no_HP" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_hp" wire:model="no_hp" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="berat_badan" class="col-sm-3 col-form-label">Berat Badan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="berat_badan" wire:model="berat_badan" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tinggi_badan" class="col-sm-3 col-form-label">tinggi_badan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tinggi_badan" wire:model="tinggi_badan" disabled>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="aktivitas" class="col-sm-3 col-form-label">Aktivitas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="aktivitas" wire:model="aktivitas" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alergi" class="col-sm-3 col-form-label">Alergi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alergi" wire:model="alergi" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="hasil" class="col-sm-3 col-form-label">Hasil Cek Gratis</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="hasil" wire:model="hasil" disabled>
                            </div>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-primary" name="submit" wire:click="hitung()">HITUNG</button>
                                <button type="button" class="btn btn-secondary" name="submit" wire:click="clear()">Clear</button>        
                            </div>
                        </div>
                        
                    </div>    
                </div>
        
                
            </form>
        </div>
        
        <!-- AKHIR FORM -->

        
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


