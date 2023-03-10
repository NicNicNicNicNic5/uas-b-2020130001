@extends('layouts.master')
@section('title', 'Add New Item')
@section('content')
    <h2>Add New Item</h2>
    <form action="{{ route('items.store') }}" method="POST">
        {{-- nama rutenya khusus --}}
        @csrf
        {{-- Cross-site request forgery --}}
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="id">id</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="nama">nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="harga">harga</label>
                <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga"
                    min="0" value="{{ old('harga') }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="stok">stok</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror"
                    name="stok" id="stok" min="0" value="{{ old('stok') }}">
                @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
