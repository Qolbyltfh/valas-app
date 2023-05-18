@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('valas.create') }}"> Create Valas</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Valas</th>
                <th>Nilai Jual</th>
                <th>Nilai Beli</th>
                <th>Tanggal Rate</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($valas as $index => $data)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $data->nama_valas }}</td>
                <td>{{ $data->nilai_jual }}</td>
                <td>{{ $data->nilai_beli }}</td>
                <td>{{ $data->tanggal_rate }}</td>
                <td>
                    <form action="{{ route('valas.destroy',$data->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('valas.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $valas->links() !!}
</div>
@endsection