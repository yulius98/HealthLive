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
    
    <!-- START DATA PELANGGAN YANG BELUM PUNYA PAKET -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h4 class="font-medium">Data Pelanggan yang Belum Memiliki Paket</h4>
        
        {{ $dtpelanggan->links() }}
        <table class="table table-striped table-sortable ">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4 sort" @if ($sortcolom == 'nama') {{ $sortdirection }} @endif wire:click="sort('nama')">Nama Pelanggan</th>
                    
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($dtpelanggan as $key => $value)
                <tr>
                    <td>{{ $dtpelanggan->firstItem() + $key }}</td>
                    <td>{{ $value->nama  }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a wire:click="edit_pelanggan({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
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
                        <label for="nama" class="col-sm-3 col-form-label">Nama Pelanggan*</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_pelanggan" wire:model="nama_pelanggan">
                            <input type="hidden" class="form-control mt-2" id="id_paket" wire:model="id_pelanggan" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Paket*</label>
                        <div class="col-sm-9">
                            <div class="d-flex gap-2">
                                
                                <!-- Dropdown Paket -->
                                <div class="dropdown flex-grow-1">
                                    <button class="btn btn-outline-primary w-100 d-flex justify-between align-items-center" type="button"
                                        id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="me-auto">{{ $nama_paket ?? 'Pilih Paket' }}</span>
                                        <span class="dropdown-toggle ps-2"></span>
                                    </button>

                                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownPaket">
                                        @foreach ($dtpaket as $item)
                                            <li>
                                                <a class="dropdown-item"
                                                href="#"
                                                wire:click.prevent="selectPaket({{ $item->id }})">
                                                    {{ $item->nama_paket }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Menampilkan ID kategori yang dipilih -->
                            <input type="hidden" class="form-control mt-2" id="id_paket" wire:model="id_paket" readonly>

                        </div>
                    </div>
                </div>
    
                
            </div>
    
            <!-- Tombol SIMPAN -->
            <div class="mb-3 row">
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-primary" name="submit" wire:click="simpan()">SIMPAN</button>
                    <button type="button" class="btn btn-secondary" name="submit" wire:click="clear()">Clear</button>    
                </div>
            </div>
        </form>
    </div>
    
    <!-- AKHIR FORM -->
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h4 class="font-medium">Data Paket Pelanggan</h4>
        <div class="pb-3 pt-3">
            <input type="text" class="form-control mb-3 w-25" placeholder="Search..." wire:model.live="cari">
        </div>
        {{ $dtpaketpelanggan->links() }}
        <table class="table table-striped table-sortable ">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4 sort" @if ($sortcolom == 'nama') {{ $sortdirection }} @endif wire:click="sort('nama')">Nama Pelanggan</th>
                    <th class="col-md-2 sort" >Paket</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($dtpaketpelanggan as $key => $value)
                <tr>
                    <td>{{ $dtpaketpelanggan->firstItem() + $key }}</td>
                    <td>{{ $value->nama  }}</td>
                    <td>{{ $value->nama_paket }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
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



