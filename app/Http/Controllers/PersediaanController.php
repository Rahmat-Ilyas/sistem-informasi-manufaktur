<?php

namespace App\Http\Controllers;

use App\Model\Bahan;
use App\Model\Pembelian;
use App\Model\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PersediaanController extends Controller
{
	public function persediaanbahan()
	{
		$barang = Bahan::all();
		return view('persediaan.persediaanbahan', compact('barang'));
	}

	public function updatestok(Request $request, $id)
	{
		$this->validate($request, [
			'stok_tersedia' => 'required',
		]);

		$bahan = Bahan::findOrFail($id);
		$bahan->update([
			'stok_tersedia' => $request->stok_tersedia,
		]);

		return redirect('persediaan/persediaanbahan')->with('msg', 'Stok persediaan berhasil diupdate!');
	}

	public function persediaanbarang()
	{
		return view('persediaan.persediaanbarang');
	}
}
