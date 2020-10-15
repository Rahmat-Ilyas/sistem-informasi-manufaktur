@extends('layouts.template')

@section('judul', 'Edit Data Penjualan Barang')
@section('penjualan', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Data Penjualan Barang</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <a href="{{ url('penjualan/datapenjualan') }}" role="button" class="btn btn-link">
                            <i class="fa fa-table"></i>&nbsp; Lihat Data Penjualan
                        </a>
                    </div>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        @foreach($errors->all() as $error)
                        {{ $error }}&nbsp|&nbsp
                        @endforeach
                    </div>
                    @endif
                    <form action="/penjualan/datapenjualan/{{ $penjualan->id }}/update" method="POST" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Kode Penjualan</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="kd_penjualan"class="form-control" readonly value="{{ $penjualan->kd_penjualan }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="jenis_barang" class=" form-control-label">Jenis Barang</label></div>
                                <div class="col-12 col-md-8">
                                    <select name="jenis_barang" id="jenis_barang" class="form-control">
                                        <?php $barang = ['Kusen Pintu', 'Kusen Jendela', 'Lainnya'] ?>
                                        @foreach($barang as $brg)
                                        <option value="{{ $brg }}" <?php if($brg == ((old('jenis_barang')) ? (old('jenis_barang')) : $penjualan->jenis_barang)) echo "selected" ?>>{{ $brg }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-1">
                                    <a href="{{ url('') }}" role="button" class="btn btn-primary btn-block" title="Tambah Jenis Barang"><i class="fa fa-plus-square"></i></a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="jenis_bahan" class=" form-control-label">Jenis Bahan</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="jenis_bahan" id="jenis_bahan" class="form-control">
                                        <?php $bahan = ["Kayu", "Aluminium", "Lainnya"]; ?>
                                        @foreach($bahan as $bhn)
                                        <option value="{{ $bhn }}"  <?php if($bhn == ((old('jenis_bahan')) ? (old('jenis_bahan')) : $penjualan->jenis_bahan)) echo "selected" ?>>{{ $bhn }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="jumlah_beli" class=" form-control-label">Jumlah Beli</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="jumlah_beli" name="jumlah_beli"class="form-control" value="{{ (old('jumlah_beli')) ? old('jumlah_beli') : $penjualan->jumlah_beli }}" placeholder="Masukkan jumlah beli">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="harga_beli" class="form-control-label">Total Harga Beli</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="harga_beli" name="harga_beli"class="form-control" value="{{ (old('harga_beli')) ? old('harga_beli') : $penjualan->harga_beli }}" placeholder="Masukkan total harga beli">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="tgl_beli" class=" form-control-label">Tanggal Beli</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="tgl_beli" name="tgl_beli"class="form-control" value="{{ (old('tgl_beli')) ? old('tgl_beli') : $penjualan->tgl_beli }}" placeholder="Masukkan nama barang">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="alamat" class="form-control-label">Alamat Pembeli</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea type="text" id="alamat" name="alamat"class="form-control" rows="3">{{ (old('alamat')) ? old('alamat') : $penjualan->alamat }}</textarea>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Update</button>
                            <a href="{{ url('/penjualan/datapenjualan') }}" role="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-times-circle-o"></i>&nbsp; Batalkan</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
    @endsection
