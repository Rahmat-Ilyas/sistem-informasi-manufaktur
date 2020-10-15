@extends('layouts.template')

@section('judul', 'Edit Data Pembelian Barang')
@section('pembelian', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Data Pembelian Barang</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <a href="{{ url('pembelian/datapembelian') }}" role="button" class="btn btn-link">
                            <i class="fa fa-table"></i>&nbsp; Lihat Data Pembelian
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
                    <form action="/pembelian/datapembelian/{{ $pembelian->id }}/update" method="POST" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Kode Pembelian</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="kd_beli"class="form-control" readonly value="{{ $pembelian->kd_beli }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nama_supplier" class=" form-control-label">Nama Supllier</label></div>
                                <div class="col-12 col-md-8">
                                    <select name="nama_supplier" id="nama_supplier" class="form-control">
                                        @foreach($supplier as $data)
                                        <option value="{{ $data->nama_supplier }}" <?php if($data->nama_supplier == ((old('nama_supplier')) ? (old('nama_supplier')) : $pembelian->nama_supplier)) echo "selected" ?> >
                                            {{ $data->nama_supplier }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-1">
                                    <a href="{{ url('supplier/tambahsupplier/dta') }}" role="button" class="btn btn-primary btn-block" title="Tambah Supplier"><i class="fa fa-plus-square"></i></a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nama_barang" class=" form-control-label">Nama Barang</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="nama_barang" name="nama_barang"class="form-control" value="{{ (old('nama_barang')) ? old('nama_barang') : $pembelian->nama_barang }}" placeholder="Masukkan nama barang">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="jumlah_beli" class=" form-control-label">Jumlah Beli</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="jumlah_beli" name="jumlah_beli"class="form-control" value="{{ (old('jumlah_beli')) ? old('jumlah_beli') : $pembelian->jumlah_beli }}" placeholder="Masukkan jumlah beli">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="harga_beli" class="form-control-label">Total Harga Beli</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="harga_beli" name="harga_beli"class="form-control" value="{{ (old('harga_beli')) ? old('harga_beli') : $pembelian->harga_beli }}" placeholder="Masukkan total harga beli">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="tgl_beli" class=" form-control-label">Tanggal Beli</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="tgl_beli" name="tgl_beli"class="form-control" value="{{ (old('tgl_beli')) ? old('tgl_beli') : $pembelian->tgl_beli }}" placeholder="Masukkan nama barang">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" name="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Update</button>
                            <a href="{{ url('/pembelian/datapembelian') }}" role="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-times-circle-o"></i>&nbsp; Batalkan</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
    @endsection
