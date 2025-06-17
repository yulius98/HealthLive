<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblPaket extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'tbl_pakets';
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'panduan_paket',
        'video_panduan',
    ];
    public function programpelanggan()
    {
        return $this->hasMany(TblProgramPelanggan::class, 'id_paket');
    }
   
}