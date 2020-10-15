@extends('layouts.template')

@section('judul', 'Tambah Data Penjualan Barang')
@section('tambahpenjualan', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Tambah Data Penjualan Barang</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <a href="{{ url('penjualan/datapenjualan') }}" role="button" class="btn btn-link">
                            <i class="fa fa-table"></i>&nbsp; Lihat Data Penjualan
                        </a>
                    </div>
                    @if(session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('msg') }}
                    </div>
                    @endif

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
                    <form action="/penjualan/storepenjualan" method="POST" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Kode Penjualan</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="kd_penjualan"class="form-control" readonly value="{{ $kd_jual }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="jenis_barang" class=" form-control-label">Jenis Barang</label></div>
                                <div class="col-12 col-md-8">
                                    <select name="jenis_barang" id="jenis_barang" class="form-control">
                                       <option value="Kusen Pintu">Kusen Pintu</option>
                                       <option value="Kusen Jendela">Kusen Jendela</option>
                                       <option value="Kusen Jendela">Lainnya</option>
                                   </select>
                               </div>
                               <div class="col-12 col-md-1">
                                <a href="{{ url('#') }}" role="button" class="btn btn-primary btn-block" title="Tambah Jenis Barang"><i class="fa fa-plus-square"></i></a>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="jenis_bahan" class=" form-control-label">Jenis Bahan</label></div>
                            <div class="col-12 col-md-9">
                                <select name="jenis_bahan" id="jenis_bahan" class="form-control">
                                   <option value="Kayu">Kayu</option>
                                   <option value="Aluminium">Aluminium</option>
                                   <option value="">Lainnya</option>
                               </select>
                           </div>
                       </div>
                       <div class="row form-group">
                        <div class="col col-md-3"><label for="jumlah_beli" class=" form-control-label">Jumlah Beli</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="jumlah_beli" name="jumlah_beli"class="form-control" value="{{ old('jumlah_beli') }}" placeholder="Masukkan jumlah beli">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="harga_beli" class="form-control-label">Total Harga Beli</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="harga_beli" name="harga_beli"class="form-control" value="{{ old('harga_beli') }}" placeholder="Masukkan total harga beli">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tgl_beli" class=" form-control-label">Tanggal Beli</label></div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="tgl_beli" name="tgl_beli"class="form-control" value="{{ old('tgl_beli') }}" placeholder="Masukkan nama barang">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="alamat" class="form-control-label">Alamat Pembeli</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea type="text" id="alamat" name="alamat"class="form-control" rows="3">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" name="submit" class="btn btn-outline-success btn-sm"><i class="fa  fa-plus-square-o"></i>&nbsp; Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div><!-- .animated -->
@endsection
