<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblBarang extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'tbl_barangs';
    protected $fillable = [
        'nama_product',
        'image',
        'description',
        'discount',
        'harga_diskon',
        'harga',
    ];
}