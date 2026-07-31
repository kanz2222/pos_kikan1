@extends('layouts.app')

@section('title', 'Detail Produk')

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

    /* Hero Banner */
    .hero-banner-detail {
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
    }

    .hero-banner-detail::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #ec4899 100%);
    }

    .hero-banner-detail h1 {
        color: #ffffff !important;
    }

    .hero-banner-detail p {
        color: #94a3b8 !important;
    }

    /* Custom Card Container */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        background: #0f172a;
        backdrop-filter: blur(8px);
        overflow: hidden;
        transition: all 0.25s ease-in-out;
    }

    .custom-card:hover {
        border-color: rgba(16, 185, 129, 0.4);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(16, 185, 129, 0.2);
    }

    /* Image Styling */
    .product-detail-img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
        background-color: #1e293b;
    }

    /* Labels & Values */
    .info-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        color: #94a3b8;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: #f8fafc;
    }

    /* Badges */
    .badge-price-buy {
        background-color: #1e293b;
        color: #cbd5e1;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 700;
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: inline-block;
    }

    .badge-price-sell {
        background-color: rgba(16, 185, 129, 0.15);
        color: #10b981;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 700;
        border: 1px solid rgba(16, 185, 129, 0.3);
        display: inline-block;
    }

    .badge-stock {
        background: #10b981;
        color: #000000;
        padding: 6px 14px;
        border-radius: 50px;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        display: inline-block;
    }

    /* Action Buttons */
    .btn-back-custom {
        background: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #cbd5e1;
        font-weight: 600;
        border-radius: 50px;
        padding: 0.6rem 2rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-back-custom:hover {
        background: #334155;
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.2);
    }

    .btn-edit-custom {
        background: #f59e0b;
        border: none;
        color: #000000;
        font-weight: 700;
        border-radius: 50px;
        padding: 0.6rem 2rem;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        transition: all 0.2s ease-in-out;
    }

    .btn-edit-custom:hover {
        background: #d97706;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(217, 119, 6, 0.4);
    }

    .border-top {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <div class="hero-banner-detail p-4 p-md-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: #10b981; color: #000000;">
                    <i class="bi bi-search me-1"></i> Rincian Produk
                </span>
                <h1 class="h3 fw-bold mb-1">Informasi Produk</h1>
                <p class="mb-0 small">Melihat detail lengkap data inventaris produk.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('produk.index') }}" class="btn btn-outline-light rounded-pill px-4 fw-bold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card custom-card p-4 p-md-5">
                    <div class="row align-items-center g-4">
                        
                        <div class="col-md-5 text-center">
                            @if($produk->foto)
                                <img src="{{ asset('storage/' . $produk->foto) }}" class="product-detail-img" alt="{{ $produk->nama }}">
                            @else
                                <div class="product-detail-img d-flex align-items-center justify-content-center text-muted">
                                    <i class="bi bi-image fs-1 opacity-50" style="color: #10b981;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-7">
                            <div class="mb-4">
                                <div class="info-label">Nama Produk</div>
                                <div class="fs-3 fw-bold text-light">{{ $produk->nama }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="info-label">Harga Beli (Dasar)</div>
                                    <div class="mt-1">
                                        <span class="badge-price-buy">Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info-label">Harga Jual</div>
                                    <div class="mt-1">
                                        <span class="badge-price-sell">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="info-label">Stok Tersedia</div>
                                    <div class="mt-1">
                                        <span class="badge-stock">{{ $produk->stok }} pcs</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info-label">Diinput Oleh</div>
                                    <div class="info-value mt-1 text-light">
                                        <i class="bi bi-person-circle me-1" style="color: #10b981;"></i> {{ $produk->user->name ?? 'Admin' }}
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-2 pt-3 border-top">
                                <a href="{{ route('produk.index') }}" class="btn btn-back-custom">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                                </a>
                                @can('update', $produk)
                                <a href="{{ route('produk.edit', $produk) }}" class="btn btn-edit-custom">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>
                                @endcan
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection