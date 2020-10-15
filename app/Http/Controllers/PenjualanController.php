<?php

namespace App\Http\Controllers;

use App\Model\Bahan;
use App\Model\Supplier;
use App\Model\Penjualan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	//Penjualan
	public function tambahpenjualan()
	{
		$penjualan = Penjualan::all()->last();
		$supplier = Supplier::all();

		if ($penjualan == null) $id = 1;
		else $id = $penjualan->id+1;

		$kd_jual = 'TRS-'.strtoupper(date('M')).'-0'.$id;
		return view('penjualan.tambahdatapenjualan', compact('kd_jual', 'supplier'));
	}

	public function storepenjualan(Request $request)
	{
		$this->validate($request, [
			'kd_penjualan' => 'required',
			'jenis_barang' => 'required',
			'jenis_bahan'  => 'required',
			'jumlah_beli'  => 'required',
			'harga_beli'   => 'required',
			'tgl_beli' 	   => 'required',
			'alamat'   	   => 'required',
		]);

		$status_kirim = "Belum di kirim";
		$penjualan = Penjualan::create([
			'kd_penjualan' => $request->kd_penjualan,
			'jenis_barang' => $request->jenis_barang,
			'jenis_bahan'  => $request->jenis_bahan,
			'jumlah_beli'  => $request->jumlah_beli,
			'harga_beli'   => $request->harga_beli,
			'tgl_beli'     => $request->tgl_beli,
			'alamat'       => $request->alamat,
			'status_kirim' => $status_kirim,
		]);
		
		return redirect('penjualan/tambahpenjualan')->with('msg', 'Data penjualan berhasil ditambah!');
	}

	public function datapenjualan()
	{
		$penjualan = Penjualan::all();
		return view('penjualan.datapenjualan', compact('penjualan'));
	}

	public function editdatapenjualan($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		if(empty($penjualan)) abort(404);

		return view('penjualan.editdatapenjualan', compact('penjualan', 'jenis_barang', 'jenis_bahan'));
	}

	public function updatedatapenjualan(Request $request, $id)
	{
		$this->validate($request, [
			'kd_penjualan' => 'required',
			'jenis_barang' => 'required',
			'jenis_bahan'  => 'required',
			'jumlah_beli'  => 'required',
			'harga_beli'   => 'required',
			'tgl_beli' 	   => 'required',
			'alamat'   	   => 'required',
		]);

		$penjualan = Penjualan::findOrFail($id);
		$penjualan->update([
			'kd_penjualan' => $request->kd_penjualan,
			'jenis_barang' => $request->jenis_barang,
			'jenis_bahan'  => $request->jenis_bahan,
			'jumlah_beli'  => $request->jumlah_beli,
			'harga_beli'   => $request->harga_beli,
			'tgl_beli'     => $request->tgl_beli,
			'alamat'       => $request->alamat,
		]);

		return redirect('penjualan/datapenjualan')->with('msg', 'Data penjualan berhasil diedit!');
	}

	public function deletedatapenjualan($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		$penjualan->delete();

		return redirect('penjualan/datapenjualan')->with('msg', 'Data penjualan berhasil dihapus!');
	}

	public function laporanpenjualan()
	{
		$penjualan = Penjualan::all();

		foreach ($penjualan as $i => $value) {
			$data_msk[$i] = $value->harga_beli;
			$data_brg[$i] = $value->jumlah_beli;
		}

		$pemasukan = array_sum($data_msk);
		$barang = array_sum($data_brg);

		return view('penjualan.laporanpenjualan', compact('penjualan', 'pemasukan', 'barang'));
	}

	public function datapengiriman()
	{
		$penjualan = Penjualan::all();

		foreach ($penjualan as $i => $data) {
			$disabled[$i] = "";
			$status = $data->status_kirim;
			if ($status == "Belum di kirim") {
				$warna[$i] = "text-danger";
				$id_set[$i] = 1;
			}
			else if ($status == "Dalam proses pengiriman") {
				$warna[$i] = "text-success";
				$id_set[$i] = 2;
			}
			else {
				$warna[$i] = "text-secondary";
				$disabled[$i] = "disabled";
				$id_set[$i] = 3;
			}
		}

		return view('penjualan.datapengiriman', compact('penjualan', 'warna', 'disabled', 'id_set'));
	}

	public function updatekirim(Request $request, $id)
	{
		$id_set = $request->id_set;
		if ($id_set == 1) {
			$status = "Dalam proses pengiriman";
		}
		else if ($id_set == 2) {
			$status = "Sampai ditujuan";
		}

		$penjualan = Penjualan::findOrFail($id);
		$penjualan->update([
			'status_kirim' => $status,
		]);

		return redirect('penjualan/datapengiriman')->with('msg', 'Status pengiriman berhasil diupdate!');
	}
}
