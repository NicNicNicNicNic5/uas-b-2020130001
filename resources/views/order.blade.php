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
                        <a href="{{ url('/order/createOrder') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Order</span>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th width="50%" scope="row">{{ $loop->iteration }}</th>
                            <td width="50%">{{ $order->id }}</td>
                            <td width="50%">{{ $order->status }}</td>
                            {{-- <td>
                                <input class="form-check-input" type="radio" name="status" id="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    {{ __('Menunggu Pembayaran') }}
                                </label>
                                <BR>
                                <input class="form-check-input" type="radio" name="status" id="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    {{ __('Selesai') }}
                                </label>
                            </td> --}}
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
