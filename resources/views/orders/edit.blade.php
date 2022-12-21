@extends('layouts.master')
@section('title', 'Edit Order')
@section('content')
    <h2>Update Order ID : {{ $selected->id }}</h2>
    <BR>
    <h5>Status Pembayaran :</h5>
    <BR>
    <form action="{{ route('orders.update', ['orders' => $selected->orders_id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    {{-- <th>#</th> --}}
                    <th width="10%">ID</th>
                    <th width="60%">Status pembayaran</th>
                    <th width="30%">Kendali pengontrolan data</th>
                </tr>
            </thead>
            <tbody>
                @php
                $index = 0;
            @endphp
            @forelse ($order as $order)
                <tr>
                    {{-- <th width="50%" scope="row">{{ $loop->iteration }}</th> --}}
                    <td width="20%">{{ $order->id }}</td>
                    {{-- <td width="30%">{{ $order->status }}</td> --}}
                    {{-- <td width="50%">{{ $order->status }}</td> --}}
                    <td width="40%">
                        <div class="row p-2">
                            <div class="col-sm-4">
                                <input class="form-check-input" type="radio" name="status[{{ $order->id }}]"
                                    id="status" value="status" {{-- <input class="form-check-input" type="radio" name="status" id="status" value="Menunggu Pembayaran" --}}
                                    {{ $order->status == 'Menunggu Pembayaran' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    {{ __('Menunggu Pembayaran') }}
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-check-input" type="radio" name="status[{{ $order->id }}]"
                                    id="status" value="status" {{-- <input class="form-check-input" type="radio" name="status" id="status" value="Selesai" --}}
                                    {{ $order->status == 'Selesai' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    {{ __('Selesai') }}
                                </label>
                            </div>
                        </div>
                    </td>
                    <td width="40%">
                        <div class="col-sm-4">
                            <div class="btn-group" role="group">
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary ml-1">Edit</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td align="center" colspan="6">No data yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{-- <div class="row">
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
        </div> --}}
        <BR>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
