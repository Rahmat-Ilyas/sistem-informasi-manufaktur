@extends('layouts.template')

@section('judul', 'Laporan Penjualan Barang')
@section('laporanpenjualan', 'active')


@section('content')

<!-- App css -->
<link href="{{ asset('datatables/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('datatables/js/modernizr.min.js') }}"></script>

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Laporan Penjualan Barang</strong>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kode Penjualan</th>
                                <th>Jenis Barang</th>
                                <th>Jenis Bahan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Tanggal Beli</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $data)
                            <tr style="font-size: 15px;">
                                <td>{{ $data->kd_penjualan }}</td>
                                <td>{{ $data->jenis_barang }}</td>
                                <td>{{ $data->jenis_bahan }}</td>
                                <td>{{ $data->jumlah_beli }}</td>
                                <td>{{ $data->harga_beli }}</td>
                                <td>{{ date('d F Y', strtotime($data->tgl_beli)) }}</td>
                                <td>{{ $data->alamat }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>                          
                                <th colspan="2">Total Penjualan:&nbsp;{{ $barang }}&nbsp;Unit</th>
                                <th colspan="5">Total Pemasukan: Rp.&nbsp;{{ $pemasukan }}</th>   
                            </tr>
                        </thead>
                    </table>
                    <div class="hidden-print mt-4 mr-4">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@endsection

