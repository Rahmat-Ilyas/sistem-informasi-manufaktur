<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $fillable = [
		'kd_barang', 'nama_barang', 'barang_masuk', 'stok_tersedia'
	];
}
