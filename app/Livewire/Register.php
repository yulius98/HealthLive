<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TblPaket;
use App\Models\TblProgramPelanggan;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class Register extends Component
{
    use WithPagination, WithPagination;
    public $id_paket, $nama_paket, $nama, $email, $nohp, $password, $role;
    public function simpan(){
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

        $dtuser = [
            'nama' => $this->nama,
            'email' => $this->email,
            'nohp' => $this->nohp,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ];

        if ($this->role == 'user'){
            User::create($dtuser);
            $id_pelanggan = User::where('email','=', $this->email)
                            ->first();

            $dtprogpelanggan = [
                'id_pelanggan' => $id_pelanggan->id,
                'id_paket' => $this->id_paket,
            ];
            TblProgramPelanggan::create($dtprogpelanggan);    
        } else {
            User::create($dtuser);
        }
        
        session()->flash('message', 'Registration successful!');
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
        $dtpaket = TblPaket::all();
        return view('livewire.register',['dtpaket' => $dtpaket]);
    }
}