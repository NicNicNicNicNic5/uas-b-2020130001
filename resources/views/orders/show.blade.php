@extends('layouts.master')
@section('title', 'Orders data')
@section('content')
    <div class="col-md-12">
        <div class="row">
            {{-- <div class="col-md-8">
                <h2>{{ "ID : $orders->id" }}</h2>
            </div> --}}
            {{-- <div class="col-md-4">
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
            </div> --}}
            <h5>
        </div>
        <BR>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                {{-- <tr> --}}
                {{-- @php
                $iterasi = count(DB::table('items')->get('id'));
                for ($i=1; $i<=$iterasi ; $i++) {

                }
            @endphp --}}

                @php
                    $iterasi = count(DB::table('items')->get('id'));

                @endphp
                @for ($i = 0; $i < $iterasi; $i++)
                    <tr>
                        <td>
                            {{ $i+1 }}
                        </td>
                        @php
                             $namabarang = DB::table('items')->where('id', 100010001000100+$i )->get('nama');
                        @endphp
                        <td>{{ $namabarang }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{-- @for ($j = 0; $j < 1; $j++) --}}
                            {{-- {{ $orders->status }} --}}
                            {{-- <td> --}}
                                {{-- @php --}}
                                    {{-- {{ $orders->status }} --}}
                                {{-- @endphp --}}
                            {{-- </td> --}}
                        {{-- @endfor --}}
                    </tr>
                @endfor

                {{-- @forelse ($items as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}</td>
                    <td></td>
                    <td>{{ $item->harga }}</td>
                    <td></td>
                </tr>
            @empty
            <tr>
                    <td align="center" colspan="6">No data yet.</td>
                </tr>
            @endforelse --}}
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTAL BAYAR</td>
                    <td>TOTAL</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <BR>
    @endsection
