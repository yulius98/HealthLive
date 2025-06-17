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
                        <label for="nama" class="col-sm-3 col-form-label">Nama*</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" wire:model="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email*</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" wire:model="email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_hp" wire:model="no_hp">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" wire:model="password">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select wire:model="role" id="role" name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#723322] focus:ring-[#723322]">
                                <option value="user"></option>
                                <option value="user">Pelanggan</option>
                                <option value="admin">Admin/CS</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Paket Pelanggan</label>
                        <div class="col-sm-9">
                            <div class="d-flex gap-2">
                                
                                <!-- Dropdown Paket -->
                                <div class="dropdown flex-grow-1">
                                    <button class="btn btn-outline-primary w-100 d-flex justify-between align-items-center" type="button"
                                        id="dropdownPaket" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <!-- Menampilkan ID Paket yang dipilih -->
                            <input type="hidden" class="form-control mt-2" id="id_paket" wire:model="id_paket" readonly>

                        </div>
                    </div>

                </div>
    
                
            </div>
    
            <!-- Tombol SIMPAN -->
            <div class="mb-3 row">
                <div class="col-12 text-end">
                    
                    <button type="button" class="btn btn-primary" name="submit" wire:click="simpan()">Simpan</button>
                    <button type="button" class="btn btn-primary" name="submit" wire:click="kirim()">Kirim</button>    
                    <button type="button" class="btn btn-secondary" name="submit" wire:click="clear()">Clear</button>    
                    
                </div>
            </div>
        </form>
    </div>
    
    <!-- AKHIR FORM -->

    
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



