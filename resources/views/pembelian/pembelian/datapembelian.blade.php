@extends('layouts.template')

@section('judul', 'Data Pembelian Barang')
@section('pembelian', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Pembelian Barang</strong>
                </div>
                <div class="card-body">
                    @if(session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('msg') }}
                    </div>
                    @endif
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Pembelian</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Supplier</th>
                                <th>Proses</th>
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
                                <td class="text-center" style="min-width: 150px;">
                                    <a href="{{ url('/pembelian/datapembelian/'.$data->id.'/edit') }}" role="button" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#staticModal{{ $data->id }}"><i class="fa fa-trash-o"></i>&nbsp; Delete</button>
                                </td>
                            </tr>

                            <!-- Konfirmasi Hapus -->
                            <div class="modal fade" id="staticModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">Hapus Data Pembelian</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Hapus data pembelian barang {{$data->kd_beli}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="/pembelian/datapembelian/{{ $data->id }}/delete" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Konfirmasi Hapus -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@endsection
