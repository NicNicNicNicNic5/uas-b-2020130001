@extends('layouts.master')
@section('title', 'Edit Item')
@section('content')
    <h2>Update Item ID : {{ $item->id }}</h2>
    <BR>
    <form action="{{ route('items.update', ['item' => $item->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') ?? $item->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="col-md-6 mb-3">
                <label for="genre">Genre</label>
                <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre"
                    id="genre" value="{{ old('genre') ?? $movie->genre }}">
                @error('genre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}
        </div>
        {{-- <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                rows="3">{{ old('description') ?? $movie->description }}
 </textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="harga">Harga</label>
                <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga"
                    min="0" value="{{ old('harga') ?? $item->harga }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="stok">Stok</label>
                <input type="number"  class="form-control @error('stok') is-invalid @enderror"
                    name="stok" id="stok" min="0"
                    value="{{ old('stok') ?? $item->stok }}">
                @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <BR>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
