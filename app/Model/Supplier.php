<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'kd_supplier', 'nama_supplier', 'alamat', 'telepon', 'email'
    ];

    public function pembelians()
    {
        return $this->hasMany('App\Model\Pembelian');
    }
}
