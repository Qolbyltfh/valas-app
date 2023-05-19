@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create Customer</a>
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
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Membership</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $index => $data)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $data->nama_customer }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->id_membership }}</td>
                <td>
                    <form action="{{ route('customers.destroy',$data->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('customers.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $customers->links() !!}
</div>
@endsection