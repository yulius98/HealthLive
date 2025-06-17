<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblProgramPelanggan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'tbl_program_pelanggans';
    protected $fillable = [
        'id_pelanggan',
        'id_paket',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }
    public function paket()
    {
        return $this->belongsTo(TblPaket::class, 'id_paket');
    }


    
}