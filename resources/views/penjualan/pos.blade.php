@extends('layouts.app')

@section('title', 'POS Kasir')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #0d322b 0%, #0f172a 50%, #1e1b4b 100%);
        background-attachment: fixed;
        color: #f8fafc;
    }

    .page-wrapper {
        background: linear-gradient(135deg, #0d322b 0%, #0f172a 50%, #1e1b4b 100%);
        background-attachment: fixed;
        min-height: 100vh;
        padding: 2.5rem 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Hero Banner Base Style & Animations */
    .hero-banner-pos {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        color: #ffffff;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        margin-bottom: 2.5rem;
        backdrop-filter: blur(12px);
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Animasi Bar Gradasi Atas */
    .hero-banner-pos::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #ec4899 100%);
        background-size: 200% 100%;
        animation: gradientShift 6s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-banner-pos h1 {
        color: #ffffff !important;
    }

    .hero-banner-pos p {
        color: #94a3b8 !important;
    }

    /* Custom Cards */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        background: #0f172a;
        backdrop-filter: blur(12px);
        overflow: hidden;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .custom-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #ec4899 100%);
        background-size: 200% 100%;
        animation: gradientShift 6s ease infinite;
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        border-color: rgba(16, 185, 129, 0.5);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5), 0 0 20px rgba(16, 185, 129, 0.25);
    }

    .custom-card:hover::before {
        opacity: 1;
    }

    .custom-card .card-header {
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    .custom-card .card-header h5 {
        color: #ffffff !important;
    }

    /* Items / Catalog Animation */
    .product-item-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        background: #1e293b;
    }

    .product-item-card:hover {
        border-color: #10b981;
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.25);
        transform: translateY(-2px);
        background: #243347;
    }

    .product-img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        transition: transform 0.3s ease;
    }

    .product-item-card:hover .product-img {
        transform: scale(1.08);
    }

    /* Tables */
    .table-cart {
        color: #f8fafc;
        background-color: transparent !important;
    }

    .table-cart thead {
        background: #1e293b !important;
    }

    .table-cart thead th {
        border: none;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        color: #94a3b8 !important;
        background-color: #1e293b !important;
    }

    .table-cart td {
        border-color: rgba(255, 255, 255, 0.05) !important;
        color: #e2e8f0 !important;
        background-color: transparent !important;
    }

    .total-display {
        font-size: 1.5rem;
        font-weight: 800;
        color: #10b981;
    }

    /* Buttons & Inputs */
    .btn-checkout {
        background: #10b981;
        border: none;
        color: #000000;
        font-weight: 700;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.25s ease-in-out;
    }

    .btn-checkout:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
    }

    .search-input {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background-color: #1e293b;
        color: #ffffff;
        transition: all 0.25s ease;
    }

    .search-input:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
        background-color: #1e293b;
        color: #ffffff;
    }

    .search-input::placeholder {
        color: #64748b;
    }

    .form-control, .form-select {
        background-color: #1e293b !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: #ffffff !important;
        transition: all 0.25s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25) !important;
    }

    .card-footer {
        background-color: transparent !important;
        border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    .text-dark {
        color: #f8fafc !important;
    }

    .text-primary {
        color: #10b981 !important;
    }

    .bg-light {
        background-color: #1e293b !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show rounded-12 shadow-sm mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="hero-banner-pos p-4 p-md-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: #10b981; color: #000000;">
                    <i class="bi bi-lightning-charge-fill me-1"></i> Kasir Point of Sale
                </span>
                <h1 class="h3 fw-bold mb-1">Transaksi Penjualan Baru</h1>
                <p class="mb-0 small">Pilih produk di sebelah kiri dan kelola keranjang belanja di sebelah kanan.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('penjualan.index') }}" class="btn btn-outline-light rounded-pill px-4 fw-bold shadow-sm">
                    <i class="bi bi-clock-history me-1"></i> Riwayat Penjualan
                </a>
            </div>
        </div>

        <div class="row g-4">
            
            {{-- ====================== KOLOM 1: DAFTAR PRODUK ============================ --}}
            <div class="col-md-6">
                <div class="card custom-card h-100">
                    <div class="card-header border-0 pt-4 px-4 pb-0">
                        <h5 class="fw-bold mb-3"><i class="bi bi-grid-fill text-primary me-2"></i> Katalog Produk</h5>
                        <form method="GET" action="{{ route('penjualan.create') }}">
                            <div class="input-group">
                                <span class="input-group-text search-input border-end-0">
                                    <i class="bi bi-search text-muted"></i>
                                </span>
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       class="form-control search-input border-start-0 ps-0"
                                       placeholder="Cari nama produk..."
                                       onkeyup="this.form.submit()">
                            </div>
                        </form>
                    </div>

                    <div class="card-body px-4 py-3" style="max-height: 60vh; overflow-y: auto;">
                        <div class="d-flex flex-column gap-2">
                            @forelse($products as $product)
                            @php
                                $isOutOfStock = $product->stok <= 0;
                                $isDisabled = $sale->status === 'COMPLETED' || $isOutOfStock;
                            @endphp

                            <form method="POST" action="{{ route('itempenjualan.store') }}" class="product-item-card p-2 {{ $isOutOfStock ? 'opacity-50' : '' }}" style="{{ $isOutOfStock ? 'filter: grayscale(100%);' : '' }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="row align-items-center g-2">
                                    <div class="col-7">
                                        <div class="d-flex align-items-center gap-2">
                                            @if($product->foto)
                                                <img src="{{ asset('storage/' . $product->foto) }}" class="product-img" alt="Foto">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center product-img text-muted">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-bold small text-light">{{ $product->nama }}</div>
                                                <div class="text-primary small fw-semibold">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</div>
                                                @if($isOutOfStock)
                                                    <span class="badge bg-danger mt-1" style="font-size: 0.65rem;">Stok Habis</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <input type="number" name="quantity" 
                                               value="{{ $isOutOfStock ? 0 : 1 }}" 
                                               min="{{ $isOutOfStock ? 0 : 1 }}"
                                               max="{{ $product->stok }}"
                                               class="form-control form-control-sm text-center {{ $isDisabled ? 'readonly' : '' }}"
                                               {{ $isDisabled ? 'disabled' : '' }}>
                                    </div>

                                    <div class="col-2">
                                        <button type="submit" 
                                                class="btn btn-sm w-100 fw-bold {{ $isDisabled ? 'disabled' : '' }}" 
                                                style="background: {{ $isOutOfStock ? '#6c757d' : '#10b981' }}; color: #000; border: none;" 
                                                title="{{ $isOutOfStock ? 'Stok Habis' : 'Tambah ke Keranjang' }}"
                                                {{ $isDisabled ? 'disabled' : '' }}>
                                            <i class="bi bi-plus-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @empty
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-box-seam fs-1 d-block mb-2 text-primary"></i>
                                <p class="mb-0">Produk tidak ditemukan.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- ====================== KOLOM 2: KERANJANG BELANJA =========================== --}}
            <div class="col-md-6">
                <div class="card custom-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="card-header border-0 pt-4 px-4 pb-0">
                            <h5 class="fw-bold mb-0"><i class="bi bi-cart3 text-primary me-2"></i> Keranjang Belanja</h5>
                        </div>

                        <div class="card-body px-0 py-3">
                            <div class="table-responsive" style="max-height: 42vh; overflow-y: auto;">
                                <table class="table table-cart align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="ps-4">Produk</th>
                                            <th>Harga</th>
                                            <th style="width: 90px;">Qty</th>
                                            <th>Subtotal</th>
                                            <th class="text-end pe-4">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($sale->itemPenjualan as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <span class="fw-semibold small text-light">{{ $item->produk->nama ?? '-' }}</span>
                                            </td>
                                            <td class="small text-muted">Rp {{ number_format($item->produk->harga_jual ?? 0, 0, ',', '.') }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                                    @csrf @method('PUT')
                                                    <input type="number" name="quantity"
                                                           value="{{ $item->kuantitas }}"
                                                           class="form-control form-control-sm text-center"
                                                           onchange="this.form.submit()">
                                                </form>
                                            </td>
                                            <td class="fw-semibold text-primary small">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                            <td class="text-end pe-4">
                                                @can('delete', $item)
                                                <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm border-0" title="Hapus Item">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-muted">
                                                <i class="bi bi-cart-x fs-2 d-block mb-2 text-primary opacity-50"></i>
                                                Keranjang belanja masih kosong
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer border-0 p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-white fw-semibold"">Total Pembayaran:</span>
                            <span class="total-display">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
                        </div>

                        <form id="checkoutForm" method="POST" action="{{ route('penjualan.update', $sale->id) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <select name="payment_method" class="form-select rounded-10 px-3 py-2" required>
                                    <option value="">-- Pilih Metode Pembayaran --</option>
                                    <option value="CASH">Cash (Tunai)</option>
                                    <option value="QRIS">QRIS / Non-Tunai</option>
                                </select>
                            </div>

                            <button type="button" 
                                    onclick="confirmCheckout()" 
                                    class="btn btn-checkout w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                <i class="bi bi-check-circle-fill me-1"></i> Selesaikan Checkout
                            </button>
                        </form>

                        @can('delete', $sale)
                        <form action="{{ route('penjualan.destroy', $sale->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')"
                              class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger w-100 rounded-10 py-2 small fw-semibold">
                                <i class="bi bi-x-circle me-1"></i> Batalkan Transaksi
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Library SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmCheckout() {
        const form = document.getElementById('checkoutForm');
        const paymentSelect = form.querySelector('select[name="payment_method"]');

        if (!paymentSelect.value) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Harap pilih metode pembayaran terlebih dahulu!',
                confirmButtonColor: '#10b981'
            });
            return;
        }

        Swal.fire({
            title: 'Konfirmasi Transaksi',
            text: 'Yakin ingin memproses checkout transaksi ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Proses!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection