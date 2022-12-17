@extends('layouts.master')
@section('title', $item->id)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ "ID : $item->id" }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <h5>
        </div>
        <BR>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tr>
                <td width="33%">{{ $item->nama }}</td>
                <td width="33%">{{ $item->stok }}</td>
                <td width="33%">{{ $item->harga }}</td>
            </tr>
        </table>
        <BR>
        {{-- <p class="lead">{{ "Description here" }}</p> --}}
@endsection
