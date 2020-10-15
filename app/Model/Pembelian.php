<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
	protected $fillable = [
		'kd_beli', 'supplier_id', 'nama_barang', 'jumlah_beli', 'harga_beli', 'tgl_beli', 'nama_supplier'
	];

	public function supplier()
    {
        return $this->belongsTo('App\Model\Supplier');
    }
} 