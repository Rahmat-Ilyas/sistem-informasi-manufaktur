<?php

namespace App\Http\Controllers;

use App\Model\Bahan;
use App\Model\Pembelian;
use App\Model\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PembelianController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    //Supplier
	public function datasupplier()
	{
		$supplier = Supplier::all();
		return view('pembelian.supplier.datasupplier', compact('supplier'));
	}

	public function tambahsupplier()
	{
		$supplier = Supplier::all()->last();

		if ($supplier == null) $id = 1;
		else $id = $supplier->id+1;

		$data = false;
		$kd_supplier = 'SUP-MFK-0'.$id;
		return view('pembelian.supplier.tambahsupplier', compact('kd_supplier', 'data'));
	}

	public function tambahsupplierdta()
	{
		$supplier = Supplier::all()->last();

		if ($supplier == null) $id = 1;
		else $id = $supplier->id+1;

		$data = true;
		$kd_supplier = 'SUP-MFK-0'.$id;
		return view('pembelian.supplier.tambahsupplier', compact('kd_supplier', 'data'));
	}

	public function storesupplier(Request $request)
	{
		$this->validate($request, [
			'kd_supplier'   => 'required',
			'nama_supplier' => 'required',
			'alamat'        => 'required',
			'telepon'       => 'required',
			'email'         => 'required',
		]);

		$supplier = Supplier::create([
			'kd_supplier'   => $request->kd_supplier,
			'nama_supplier' => $request->nama_supplier,
			'alamat'        => $request->alamat,
			'telepon'       => $request->telepon,
			'email'         => $request->email,
		]);
		if (empty($request->data)) return redirect('supplier/datasupplier')->with('msg', 'Data supplier berhasil ditambah!');
		else return redirect('pembelian/tambahdata');
	}

	public function editdatasupplier($id)
	{
		$supplier = Supplier::findOrFail($id);
		if(empty($supplier)) abort(404);

		return view('pembelian.supplier.editsupplier', compact('supplier'));
	}

	public function updatedatasupplier($id, Request $request)
	{
		$this->validate($request, [
			'kd_supplier'   => 'required',
			'nama_supplier' => 'required',
			'alamat'        => 'required',
			'telepon'       => 'required',
			'email'         => 'required',
		]);

		$supplier = Supplier::findOrFail($id);
		$supplier->update([
			'kd_supplier'   => $request->kd_supplier,
			'nama_supplier' => $request->nama_supplier,
			'alamat'        => $request->alamat,
			'telepon'       => $request->telepon,
			'email'         => $request->email,
		]);

		return redirect('supplier/datasupplier')->with('msg', 'Data supplier berhasil diedit!');
	}

	public function deletedatasupplier($id)
	{
		$supplier = Supplier::findOrFail($id);
		$supplier->delete();

		return redirect('supplier/datasupplier')->with('msg', 'Data supplier berhasil dihapus!');
	}

    //Pembelian Barang
	public function datapembelian()
	{
		$pembelian = Pembelian::all();
		return view('pembelian.pembelian.datapembelian', compact('pembelian'));
	}

	public function tambahdata()
	{
		$pembelian = Pembelian::all()->last();
		$supplier = Supplier::all();

		if ($pembelian == null) $id = 1;
		else $id = $pembelian->id+1;

		$kd_beli = 'MFK-'.strtoupper(date('M')).'-0'.$id;
		return view('pembelian.pembelian.tambahdatapembelian', compact('kd_beli', 'supplier'));
	}

	public function storedata(Request $request)
	{

		$this->validate($request, [
			'kd_beli'  		=> 'required',
			'nama_barang' 	=> 'required',
			'jumlah_beli'   => 'required',
			'harga_beli'    => 'required',
			'tgl_beli'      => 'required',
			'nama_supplier' => 'required',
		]);

		//Tambah dan edit data bahan
		$cekbahan = Pembelian::where('nama_barang', $request->nama_barang)->first();
		if ($cekbahan == null) {

			//Set id
			$id_bahan = Bahan::all()->last();
			if ($id_bahan == null) $id = 1;
			else $id = $id_bahan->id+1;
			$kd_barang = 'BRG-MFK-0'.$id;

			//Create
			$bahan = Bahan::create([
				'kd_barang'   	=> $kd_barang,
				'nama_barang' 	=> $request->nama_barang,
				'barang_masuk'  => $request->jumlah_beli,
				'stok_tersedia' => $request->jumlah_beli,
			]);
		}
		else
		{
			$data = Bahan::where('nama_barang', $request->nama_barang)->first();

			$barang_masuk = $data->barang_masuk+$request->jumlah_beli;
			$stok_tersedia = $data->stok_tersedia+$request->jumlah_beli;

			//Update barang masuk dan stok
			$data->update([
				'barang_masuk'   	=> $barang_masuk,
				'stok_tersedia'   	=> $stok_tersedia,
			]);
		}

		$supplier = Supplier::where('nama_supplier', $request->nama_supplier)->first();
		$id = $supplier->id;

		$pembelian = Pembelian::create([
			'kd_beli'   	=> $request->kd_beli,
			'supplier_id'   => $id,
			'nama_barang' 	=> $request->nama_barang,
			'jumlah_beli'   => $request->jumlah_beli,
			'harga_beli'    => $request->harga_beli,
			'tgl_beli'      => $request->tgl_beli,
			'nama_supplier' => $request->nama_supplier,
		]);
		
		return redirect('pembelian/tambahdata')->with('msg', 'Data pembelian berhasil ditambah!');
	}

	public function editdata($id)
	{ $pembelian = Pembelian::findOrFail($id);
		$pembelian->update([
			'kd_beli'   	=> $request->kd_beli,
			'supplier_id'   => $id_sup,
			'nama_barang' 	=> $request->nama_barang,
			'jumlah_beli'   => $request->jumlah_beli,
			'harga_beli'    => $request->harga_beli,
			'tgl_beli'      => $request->tgl_beli,
			'nama_supplier' => $request->nama_supplier,
		]);

		return redirect('pembelian/datapembelian')->with('msg', 'Data pembelian berhasil diedit!');
	}

	public function deletedata($id)
	{
		$pembelian = Pembelian::findOrFail($id);
		$pembelian->delete();

		return redirect('pembelian/datapembelian')->with('msg', 'Data pembelian berhasil dihapus!');
	}

	public function laporanpembelian()
	{
		$pembelian = Pembelian::all();

		foreach ($pembelian as $i => $value) {
			$data_klr[$i] = $value->harga_beli;
			$data_brg[$i] = $value->jumlah_beli;
		}

		$pengeluaran = array_sum($data_klr);
		$barang = array_sum($data_brg);

		return view('pembelian.pembelian.laporanpembelian', compact('pembelian', 'pengeluaran', 'barang'));
	}
}
