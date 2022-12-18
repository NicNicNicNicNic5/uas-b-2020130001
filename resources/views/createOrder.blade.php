@extends('layouts.master')
@section('title', 'Add New Order')
@section('content')
    <h2>Add New Order</h2>
    {{-- <form action="{{ route('orders.store') }}" method="POST"> --}}
    <form>
        {{-- nama rutenya khusus --}}
        @csrf
        {{-- Cross-site request forgery --}}
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="25%">Nama</th>
                    <th width="25%">Stok</th>
                    <th width="25%">Harga</th>
                    <th width="10%">Quantity</th>
                </tr>
            </thead>
            @forelse ($items as $item)
                <tr>
                    <td width="25%">{{ $item->nama }}</td>
                    <td width="25%">{{ $item->stok }}</td>
                    <td width="25%">{{ "Rp. $item->harga" }}</td>
                    <td width="10%">
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                            id="stok" min="0" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">No data yet.</td>
                </tr>
            @endforelse
        </table>

        {{-- checkbox --}}
        {{-- <div class="col-md-12 mb-3">
                <label for="status">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                    id="status" value="{{ old('status') }}">
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input class="form-check-input" type="checkbox" name="status" id="status"
                    {{ old('status') ? 'checked' : '' }}>

                <label class="form-check-label" for="status">
                    {{ __('Menunggu Pembayaran') }}
                </label>
            </div> --}}
        <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
    </form>
@endsection
