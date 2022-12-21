@extends('layouts.master')
@section('title', 'Add New Order')
@section('content')
    <h2>Add New Order</h2>
    {{-- <form action="{{ url('/order.store') }}" method="POST"> --}}
    <form action="{{ route('orders.index') }}" method="POST">
    {{-- <form> --}}
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
                <input type="hidden" name="id{{ $loop->iteration }}" id="id" value={{ $item->id }}>
                <input type="hidden" name="stok{{ $loop->iteration }}" id="stok" value={{ $item->stok }}>
                    <td width="25%">{{ $item->nama }}</td>
                    <td width="25%">{{ $item->stok }}</td>
                    <td width="25%">{{ "Rp. $item->harga" }}</td>
                    <td width="10%">
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity{{ $loop->iteration }}"
                            id="quantity" min="0" value="0">
                        @error('quantity')
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
        <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
    </form>
@endsection
