@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

@include('layouts.navbar')

<style>
    /* Latar Belakang Gelap Mulus Sesuai Halaman User & Index Produk */
    body {
        background: radial-gradient(circle at 15% 30%, #0d383b 0%, #0f172a 50%, #2a1835 100%);
        background-size: cover;
        background-attachment: fixed;
        color: #f8fafc;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .page-wrapper {
        position: relative;
        min-height: 100vh;
        padding: 2.5rem 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        z-index: 1;
    }

    /* Efek Pendar Cahaya Lembut */
    .page-wrapper::before,
    .page-wrapper::after {
        content: '';
        position: fixed;
        border-radius: 50%;
        filter: blur(120px);
        opacity: 0.25;
        z-index: -1;
    }

    .page-wrapper::before {
        width: 450px;
        height: 450px;
        background: #0d9488;
        top: 10%;
        left: -100px;
    }

    .page-wrapper::after {
        width: 500px;
        height: 500px;
        background: #7e22ce;
        bottom: 10%;
        right: -100px;
    }

    /* Hero Banner Utama */
    .hero-banner-form {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        color: #f8fafc;
        padding: 2.5rem;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    /* Garis Aksen Gradien Halus di Atas Card */
    .hero-banner-form::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #f97316, #10b981, #06b6d4, #8b5cf6);
    }

    .badge-tag-header {
        background: rgba(13, 148, 136, 0.15) !important;
        color: #2dd4bf !important;
        border: 1px solid rgba(13, 148, 136, 0.3);
    }

    /* Card Container */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        background: #0f172a !important;
        overflow: hidden;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .custom-card:hover {
        border-color: rgba(20, 184, 166, 0.4);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.5);
    }

    /* Form Inputs & Labels Style */
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25) !important;
        background-color: #0b1329 !important;
        color: #ffffff !important;
    }

    .form-control::placeholder {
        color: #64748b !important;
    }

    .form-label {
        font-weight: 600;
        color: #cbd5e1;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }

    /* Buttons Style */
    .btn-submit-custom {
        background: #10b981;
        border: none;
        color: #ffffff;
        font-weight: 700;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.2s ease;
    }

    .btn-submit-custom:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-back-custom {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #cbd5e1;
        font-weight: 600;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        transition: all 0.2s ease;
    }

    .btn-back-custom:hover {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
    }

    .btn-outline-back {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #f8fafc;
        border-radius: 8px;
        padding: 0.5rem 1.25rem;
        transition: all 0.2s ease;
    }

    .btn-outline-back:hover {
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
    }

    .border-top {
        border-color: rgba(255, 255, 255, 0.08) !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <div class="hero-banner-form p-4 p-md-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge badge-tag-header px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm">
                    <i class="bi bi-box-seam me-1"></i> Manajemen Inventaris POS
                </span>
                <h1 class="h3 fw-bold mb-1 text-white">Edit Produk</h1>
                <p class="mb-0 small" style="color: #94a3b8 !important;">Perbarui informasi data produk: <strong style="color: #2dd4bf;">{{ $produk->nama }}</strong></p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('produk.index') }}" class="btn btn-outline-back fw-bold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card custom-card p-4 p-md-5">
                    <form action="{{ route('produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        @include('produk._form')

                        <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                            <a href="{{ route('produk.index') }}" class="btn btn-back-custom">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-submit-custom">
                                <i class="bi bi-check-lg me-1"></i> Update Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection