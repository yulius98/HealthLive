<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblAssesment extends Model
{
    use HasFactory, SoftDeletes;
    
    public $table = 'tbl_assesments';
    protected $fillable = [
        'kode_assesment',
        'nama_pelanggan',
        'no_hp',
        'berat_badan',
        'tinggi_badan',
        'aktivitas',
        'alergi',
        'hasil',
        'status'
    ];
}