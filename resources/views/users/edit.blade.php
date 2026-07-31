@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

@include('layouts.navbar')

<!-- Custom Modern Vibrant Dark Palette with Black-Emerald Accents Theme Styling matching Dashboard, Navbar, POS, & Produk -->
<style>
    body {
        background: linear-gradient(135deg, #064e3b 0%, #065f46 35%, #1e1b4b 70%, #0f172a 100%);
        background-attachment: fixed;
        color: #f8fafc;
    }

    .page-wrapper {
        background: linear-gradient(135deg, #064e3b 0%, #065f46 35%, #1e1b4b 70%, #0f172a 100%);
        background-attachment: fixed;
        min-height: 100vh;
        padding: 2.5rem 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .hero-banner-form {
        background: rgba(13, 19, 33, 0.9);
        border: 1px solid rgba(52, 211, 153, 0.2);
        border-radius: 16px;
        color: #f8fafc;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
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
        background: linear-gradient(90deg, #10b981 0%, #6366f1 50%, #ec4899 100%);
    }

    .custom-card {
        border: 1px solid rgba(52, 211, 153, 0.2);
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        background: rgba(13, 19, 33, 0.92);
        backdrop-filter: blur(8px);
        overflow: hidden;
        transition: all 0.25s ease-in-out;
    }

    .custom-card:hover {
        transform: translateY(-4px);
        border-color: rgba(16, 185, 129, 0.5);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(16, 185, 129, 0.15);
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background-color: #0b1329;
        color: #f8fafc;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        background-color: #0b1329;
        color: #ffffff;
    }

    .form-label {
        font-weight: 700;
        color: #cbd5e1;
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
    }

    .btn-submit-custom {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 50px;
        padding: 0.6rem 2rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.2s ease-in-out;
    }

    .btn-submit-custom:hover {
        background: linear-gradient(135deg, #047857 0%, #059669 100%);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
    }

    .btn-back-custom {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #cbd5e1;
        font-weight: 700;
        border-radius: 50px;
        padding: 0.6rem 2rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-back-custom:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.3);
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <!-- Hero Banner / Header -->
        <div class="hero-banner-form p-4 p-md-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3);">
                    <i class="bi bi-people me-1"></i> Manajemen Akun
                </span>
                <h1 class="h3 fw-bold mb-1 text-white">Edit Akun</h1>
                <p class="text-muted mb-0 small" style="color: #94a3b8 !important;">Perbarui informasi data user: <strong class="text-white">{{ $user->name }}</strong></p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('admin.users') }}" class="btn rounded-pill px-4 fw-bold shadow-sm" style="background: rgba(255, 255, 255, 0.08); color: #f8fafc; border: 1px solid rgba(255, 255, 255, 0.2);">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card custom-card p-4 p-md-5">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        @include('users._form')

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top" style="border-color: rgba(255, 255, 255, 0.08) !important;">
                            <a href="{{ route('admin.users') }}" class="btn btn-back-custom">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-submit-custom">
                                <i class="bi bi-check-lg me-1"></i> Perbarui Akun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection