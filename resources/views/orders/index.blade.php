@extends('layouts.master')
@section('title', 'Orders List')
@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')
    @if (session()->has('success'))
        <div class="aler alert-success" role="alert">{{ session()->get('success') }}</div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Orders List</h2>
                    </div>
                    <div class="col-sm-6">
                        {{-- <a href="{{ url('/order/createOrder') }}" class="btn btn-success"> --}}
                        <a href="{{ route('orders.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Order</span>
                        </a>
                    </div>
                </div>
            </div>

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
                    @forelse ($orders as $order)
                        <tr>
                            {{-- <th width="50%" scope="row">{{ $loop->iteration }}</th> --}}
                            <td width="20%">{{ $order->id }}</td>
                            {{-- <td width="30%">{{ $order->status }}</td> --}}
                            {{-- <td width="50%">{{ $order->status }}</td> --}}
                            <td width="40%">
                                <div class="row p-2">
                                    <div class="col-sm-4">
                                        {{-- <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST"> --}}
                                            <input class="form-check-input" type="radio"
                                                name="status[{{ $order->id }}]" id="status" value="status"
                                                {{-- <input class="form-check-input" type="radio" name="status" id="status" value="Menunggu Pembayaran" --}}
                                                {{ $order->status == 'Menunggu Pembayaran' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">
                                                {{ __('Menunggu Pembayaran') }}
                                            </label>
                                        {{-- </form> --}}
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
                                        {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-warning ml-1">Show</a> --}}
                                        {{-- <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary ml-1">Edit</a> --}}
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
        </div>
    </div>
@endsection
