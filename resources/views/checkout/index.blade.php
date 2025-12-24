{{-- resources/views/checkout/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-5">
        <h1 class="h3 mb-4 text-gray-800">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="row g-5">
                <!-- Kolom Kiri: Informasi Pengiriman -->
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-primary text-white">
                            <h6 class="m-0 font-weight-bold">Informasi Pengiriman</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">Nama Penerima</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{ auth()->user()->name }}" required>
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat Lengkap</label>
                                    <textarea name="address" id="address" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Ringkasan Pesanan -->
                <div class="col-lg-4">
                    <div class="card shadow mb-4 sticky-top" style="top: 1.5rem;">
                        <div class="card-header py-3 bg-primary text-white">
                            <h6 class="m-0 font-weight-bold">Ringkasan Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <!-- Daftar Item (scroll jika banyak) -->
                            <div class="mb-4" style="max-height: 320px; overflow-y: auto;">
                                @foreach($cart->items as $item)
                                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                        <div>
                                            <div class="small fw-bold">{{ $item->product->name }}</div>
                                            <div class="text-muted small">× {{ $item->quantity }}</div>
                                        </div>
                                        <div class="text-end fw-medium">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Total -->
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <h5 class="mb-0">Total</h5>
                                <h5 class="mb-0 text-primary">
                                    Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}
                                </h5>
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">
                                Buat Pesanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection