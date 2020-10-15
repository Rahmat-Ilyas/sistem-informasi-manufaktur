@extends('layouts.template')

@section('judul', 'Data Pengiriman Barang')
@section('datapengiriman', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Pengiriman Barang</strong>
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
                                <th>Kode Penjualan</th>
                                <th>Jenis Barang</th>
                                <th>Alamat</th>
                                <th>Status Pengiriman</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $i => $data)
                            <tr style="font-size: 15px;">
                                <td>{{ $data->kd_penjualan }}</td>
                                <td>{{ $data->jenis_barang }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td class="{{ $warna[$i] }}">{{ $data->status_kirim }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#staticModal{{ $data->id }}" {{ $disabled[$i] }}><i class="fa fa-edit"></i>&nbsp; Update Status</button>
                                </td>
                            </tr>

                            <!-- Konfirmasi Update -->
                            <div class="modal fade" id="staticModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticModalLabel">Update Status Pengiriman</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Update status pengiriman penjualan {{$data->kd_penjualan}}<br><br> <i class="$warna[$i]">Status: {{$data->status_kirim}}</i>

                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="/penjualan/datapengiriman/{{$data->id}}/update" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_set" value="{{ $id_set[$i] }}">
                                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Konfirmasi Update -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@endsection
