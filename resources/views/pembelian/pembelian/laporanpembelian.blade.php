@extends('layouts.template')

@section('judul', 'Laporan Pembelian Barang')
@section('laporanpembelian', 'active')


@section('content')

<!-- App css -->
<link href="{{ asset('datatables/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />

<script src="{{ asset('datatables/js/modernizr.min.js') }}"></script>

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Laporan Pembelian Barang</strong>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kode Pembelian</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembelian as $data)
                            <tr style="font-size: 15px;">
                                <td>{{ $data->kd_beli }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>{{ $data->jumlah_beli }}</td>
                                <td>{{ $data->harga_beli }}</td>
                                <td>{{ date('d F Y', strtotime($data->tgl_beli)) }}</td>
                                <td>{{ $data->nama_supplier }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2">Total Pembelian:&nbsp;{{ $barang }}&nbsp;Item</th>
                                <th colspan="5">Total Pengeluaran: Rp.&nbsp;{{ $pengeluaran }}</th>                                
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

