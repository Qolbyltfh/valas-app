@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('memberships.create') }}"> Create Membership</a>
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
                <th>Nama Membership</th>
                <th>Diskon</th>
                <th>Minimal Profit</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($memberships as $index => $data)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $data->nama_membership }}</td>
                <td>{{ $data->diskon }}</td>
                <td>{{ $data->min_profit }}</td>
                <td>
                    <form action="{{ route('memberships.destroy',$data->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('memberships.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $memberships->links() !!}
</div>
@endsection