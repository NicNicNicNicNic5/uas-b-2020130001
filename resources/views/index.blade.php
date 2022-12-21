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

    {{-- item --}}
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Items List</h2>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>nama</th>
                        <th>harga</th>
                        <th>stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('items.show', $item->id) }}"> {{ $item->id }}</a></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @php
                $i = count(DB::table('items')->get('id'));
            @endphp
            <h4>Jenis Item: {{ $i }}</h4>
        </div>
    </div>

    {{-- order --}}
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Order Table</h2>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
                        <th width="10%">ID</th>
                        <th width="60%">Status pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 0;
                    @endphp
                    @forelse ($orders as $order)
                        <tr>
                            <td width="20%">{{ $order->id }}</td>
                            <td width="20%">{{ $order->status }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @php
                $i = count(DB::table('orders')->get('id'));
            @endphp
            <h4>Jumlah Order: {{ $i }}</h4>
        </div>
    </div>
@endsection
