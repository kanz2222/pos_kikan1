@extends('layouts.app')

@section('title', 'Edit Produk')

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
    .hero-banner-form {
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

    .hero-banner-form::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #ec4899 100%);
    }

    .hero-banner-form h1 {
        color: #ffffff !important;
    }

    .hero-banner-form p {
        color: #94a3b8 !important;
    }

    /* Card Container */
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

    /* Form Inputs & Labels */
    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        background-color: #1e293b !important;
        color: #ffffff !important;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25) !important;
        background-color: #1e293b !important;
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

    /* Buttons */
    .btn-submit-custom {
        background: #10b981;
        border: none;
        color: #000000;
        font-weight: 700;
        border-radius: 50px;
        padding: 0.6rem 2rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.2s ease-in-out;
    }

    .btn-submit-custom:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
    }

    .btn-back-custom {
        background: #1e293b;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #94a3b8;
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

    .border-top {
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <div class="hero-banner-form p-4 p-md-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: #10b981; color: #000000;">
                    <i class="bi bi-box-seam me-1"></i> Manajemen Persediaan
                </span>
                <h1 class="h3 fw-bold mb-1">Edit Produk</h1>
                <p class="mb-0 small">Perbarui informasi data produk: <strong class="text-emerald" style="color: #10b981;">{{ $produk->nama }}</strong></p>
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