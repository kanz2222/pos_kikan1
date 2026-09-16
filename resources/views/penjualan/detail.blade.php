@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: radial-gradient(circle at top left, #2b1055, #0a0b1e 70%);
        background-attachment: fixed;
        color: #f8fafc;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .page-wrapper {
        min-height: 100vh;
        padding: 2.5rem 0;
    }

    /* Hero Banner Theme */
    .hero-banner-sales {
        background: #111328;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        color: #ffffff;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
    }

    .hero-banner-sales::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #10b981 0%, #3b82f6 50%, #f43f5e 100%);
    }

    /* Cards Dark Theme */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        background: #111328;
        overflow: hidden;
    }

    /* Badge Pills Header */
    .badge-tag-header {
        background-color: rgba(16, 185, 129, 0.15) !important;
        color: #10b981 !important;
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 50rem;
        font-size: 0.75rem;
    }

    .badge-total {
        background-color: rgba(16, 185, 129, 0.12);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.25);
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1.1rem;
        display: inline-block;
    }

    /* Table Custom Styles */
    .table-custom {
        --bs-table-bg: transparent !important;
        --bs-table-accent-bg: transparent !important;
        --bs-table-striped-bg: transparent !important;
        background-color: transparent !important;
        color: #94a3b8 !important;
        margin-bottom: 0;
    }

    .table-custom thead {
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .table-custom thead th {
        border: none;
        font-weight: 700;
        letter-spacing: 0.75px;
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #64748b !important;
        padding: 1.1rem 1.25rem;
        background-color: transparent !important;
    }

    .table-custom tbody tr {
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.03) !important;
    }

    .table-custom td {
        padding: 1.1rem 1.25rem;
        border: none;
        background-color: transparent !important;
        color: #cbd5e1 !important;
    }

    .product-img {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background-color: #0a0b1e;
    }

    .info-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        color: #64748b;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1.05rem;
        font-weight: 700;
        color: #ffffff;
    }

    /* Buttons */
    .btn-teal {
        background-color: #10b981;
        color: #ffffff;
        font-weight: 600;
        border-radius: 8px;
        border: none;
        transition: all 0.2s ease-in-out;
    }

    .btn-teal:hover {
        background-color: #059669;
        color: #ffffff;
    }

    .btn-back-header {
        background-color: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.12);
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-back-header:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: #ffffff;
    }

    /* Custom Print CSS */
    @media print {
        body {
            background: #ffffff !important;
            color: #000000 !important;
        }

        /* Sembunyikan elemen yang tidak perlu dicetak */
        nav, .navbar, .hero-banner-sales, .no-print {
            display: none !important;
        }

        .page-wrapper {
            padding: 0 !important;
        }

        .custom-card {
            background: #ffffff !important;
            border: 1px solid #ddd !important;
            box-shadow: none !important;
            color: #000000 !important;
        }

        .info-label {
            color: #555555 !important;
        }

        .info-value, .fw-bold {
            color: #000000 !important;
        }

        .table-custom {
            color: #000000 !important;
        }

        .table-custom thead th {
            color: #000000 !important;
            border-bottom: 2px solid #000000 !important;
        }

        .table-custom tbody tr {
            border-bottom: 1px solid #ddd !important;
        }

        .table-custom td {
            color: #000000 !important;
        }

        .badge-total {
            background-color: transparent !important;
            color: #000000 !important;
            border: 1px solid #000000 !important;
        }

        .product-img {
            border: 1px solid #ccc !important;
        }
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <!-- Header Banner -->
        <div class="hero-banner-sales p-4 p-md-5 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge badge-tag-header px-3 py-2 mb-3 d-inline-flex align-items-center">
                    <i class="bi bi-receipt me-1"></i> Transaksi POS
                </span>
                <h1 class="display-6 fw-bold mb-1 text-white">Rincian Penjualan</h1>
                <p class="mb-0" style="color: #94a3b8 !important;">Informasi lengkap transaksi dan daftar item produk yang dibeli.</p>
            </div>
            <div class="mt-3 mt-md-0 d-flex gap-2">
                <button onclick="window.print()" class="btn btn-teal px-4 py-2">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-back-header px-4 py-2">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Area Cetak Utama -->
        <div id="print-area">
            <!-- Transaction Details Card -->
            <div class="card custom-card p-4 mb-4">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="info-label">Kasir / Petugas</div>
                        <div class="info-value" style="color: #10b981;">
                            <i class="bi bi-person-circle me-1 no-print"></i> {{ $sale->user->name ?? 'Kasir' }}
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="info-label">Tanggal Transaksi</div>
                        <div class="info-value">
                            <i class="bi bi-calendar-event me-1 no-print" style="color: #64748b;"></i> {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="info-label">Total Pembayaran</div>
                        <div class="mt-1">
                            <span class="badge-total">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 g-3">
                    <div class="col-md-4">
                        <div class="info-label">Metode Pembayaran</div>
                        <div class="info-value">{{ $sale->metode_pembayaran ?? '-' }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">Uang Diterima</div>
                        <div class="info-value">Rp {{ number_format($sale->uang_diterima ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-label">Kembalian</div>
                        <div class="info-value text-success">Rp {{ number_format($sale->kembalian ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <!-- Items Table Card -->
            <div class="card custom-card">
                <div class="card-header bg-transparent border-bottom border-secondary border-opacity-10 py-3 px-4 fw-bold fs-5 text-white">
                    <i class="bi bi-cart-check me-2 no-print" style="color: #10b981;"></i> Item Produk Terjual
                </div>
                <div class="table-responsive">
                    <table class="table table-custom align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="ps-4 py-3">#</th>
                                <th scope="col" class="py-3">Foto</th>
                                <th scope="col" class="py-3">Nama Produk</th>
                                <th scope="col" class="py-3 text-end pe-4">Harga Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sale->itemPenjualan as $index => $item)
                            <tr>
                                <th scope="row" class="ps-4 fw-bold" style="color: #64748b;">{{ $index + 1 }}</th>
                                <td>
                                    @if($item->produk && $item->produk->foto)
                                        <img src="{{ asset('storage/' . $item->produk->foto) }}" class="product-img" alt="{{ $item->produk->nama }}">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center product-img text-muted">
                                            <i class="bi bi-image fs-5" style="color: #64748b;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold text-white fs-6">{{ $item->produk->nama ?? 'Produk Dihapus' }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <span class="fw-bold" style="color: #10b981;">Rp {{ number_format($item->produk->harga_jual ?? 0, 0, ',', '.') }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="fs-5" style="color: #64748b;">
                                        <i class="bi bi-inbox fs-1 d-block mb-2" style="color: #10b981;"></i>
                                        Tidak ada item produk dalam transaksi ini.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer bg-transparent border-0 py-4 px-4 text-end no-print">
                    <a href="{{ route('penjualan.index') }}" class="btn btn-back-header px-4 py-2">
                        Kembali ke Daftar Penjualan
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection