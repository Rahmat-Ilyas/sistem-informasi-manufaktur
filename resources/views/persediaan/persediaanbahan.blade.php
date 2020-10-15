@extends('layouts.template')

@section('judul', 'Persediaan Bahan Produksi')
@section('persediaanbahan', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Persediaan Bahan Produksi</strong>
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
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Barang Masuk</th>
                                <th>Stok Tersedia</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $data)
                            <tr style="font-size: 15px;">
                                <td>{{ $data->kd_barang }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>{{ $data->barang_masuk }}</td>
                                <td>{{ $data->stok_tersedia }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#staticModal{{ $data->id }}"><i class="fa fa-edit"></i>&nbsp; Update Stok</button>
                                </td>
                            </tr>

                            <!-- Konfirmasi Hapus -->
                            <div class="modal fade" id="staticModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="/persediaan/persediaanbahan/{{ $data->id }}/updatestok" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel">Update Stok</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Update stok tersedia {{$data->kd_barang}}<br><br>
                                                    <i>Srok Tersedia: {{ $data->stok_tersedia }}</i>
                                                </p>
                                                <input type="text" name="stok_tersedia"class="form-control" placeholder="Masukkan Stok">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                {{ csrf_field() }}
                                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
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
