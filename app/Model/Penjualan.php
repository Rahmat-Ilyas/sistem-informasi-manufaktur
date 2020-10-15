<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
	protected $fillable = [
		'kd_penjualan',	'jenis_barang',	'jenis_bahan' ,	'jumlah_beli' ,	'harga_beli'  ,	'tgl_beli',	'alamat', 'status_kirim'
	];
}
