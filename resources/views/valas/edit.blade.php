@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Valas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('valas.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('valas.update', $valas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Valas:</strong>
                    <input type="text" name="nama_valas" value="{{ $valas->nama_valas }}" class="form-control" placeholder="Nama Valas">
                    @error('nama_valas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nilai Jual:</strong>
                    <input type="text" name="nilai_jual" class="form-control" placeholder="Nilai Jual" value="{{ $valas->nilai_jual }}">
                    @error('nilai_jual')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nilai Beli:</strong>
                    <input type="text" name="nilai_beli" class="form-control" placeholder="Nilai Beli" value="{{ $valas->nilai_beli }}">
                    @error('nilai_beli')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Rate:</strong>
                    <input type="date" name="tanggal_rate" value="{{ $valas->tanggal_rate }}" class="form-control" placeholder="Tanggal Rate">
                    @error('tanggal_rate')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection