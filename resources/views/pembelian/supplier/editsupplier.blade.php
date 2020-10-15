@extends('layouts.template')

@section('judul', 'Edit Data Supplier')
@section('supplier', 'active')

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Data Supplier</strong>
                </div>
                <div class="card-body card-block">
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
                    <form method="POST" action="/supplier/datasupplier/{{ $supplier->id }}/update" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Kode Supplier</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="kd_supplier"class="form-control" value="{{ $supplier->kd_supplier }}" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="nama_supplier" class=" form-control-label">Nama Supplier</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nama_supplier" name="nama_supplier"class="form-control" value="{{(old('nama_supplier')) ? old('nama_supplier') : $supplier->nama_supplier}}" placeholder="Masukkan nama supplier">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="alamat" id="alamat" rows="5" placeholder="Masukkan alamat" class="form-control">{{(old('alamat')) ? old('alamat') : $supplier->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="telepon" class=" form-control-label">Telepon</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="telepon" name="telepon"class="form-control" value="{{(old('telepon')) ? old('telepon') : $supplier->telepon}}" placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email" name="email"class="form-control" value="{{(old('email')) ? old('email') : $supplier->email}}" placeholder="Masukkan email">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" name="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>&nbsp; Update</button>
                        <a href="{{ url('/supplier/datasupplier') }}" role="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-times-circle-o"></i>&nbsp; Batalkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
@endsection
