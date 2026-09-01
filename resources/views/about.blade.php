@extends('layouts.app')

@section('title', 'Tentang Aplikasi')

@section('content')

@include('layouts.navbar')

<style>
    /* Latar Belakang Gelap Mulus Sesuai Tema UI */
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

    /* Efek Pendar Cahaya Belakang */
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

    /* Header Top Bar */
    .top-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .btn-back-custom {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(16, 185, 129, 0.4);
        color: #2dd4bf;
        font-weight: 600;
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .btn-back-custom:hover {
        background: #10b981;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .version-badge {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #2dd4bf;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    /* Hero Banner Utama */
    .hero-banner {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        color: #f8fafc;
        padding: 2.25rem;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #f97316, #10b981, #06b6d4, #8b5cf6);
    }

    .hero-icon-box {
        width: 56px;
        height: 56px;
        background: rgba(13, 148, 136, 0.2);
        border: 1px solid rgba(13, 148, 136, 0.4);
        color: #2dd4bf;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
    }

    /* Card Box */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        background: #0f172a;
        padding: 2rem;
        height: 100%;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .custom-card:hover {
        transform: translateY(-2px);
        border-color: rgba(20, 184, 166, 0.4);
    }

    /* Profile Avatar */
    .profile-avatar {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #0d9488 0%, #10b981 100%);
        border: 3px solid #14b8a6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem auto;
        color: white;
        font-size: 3rem;
        box-shadow: 0 8px 20px rgba(13, 148, 136, 0.35);
    }

    .name-badge {
        background: linear-gradient(90deg, #0d9488, #10b981);
        color: #ffffff;
        font-weight: 700;
        padding: 0.4rem 1.25rem;
        border-radius: 6px;
        display: inline-block;
        font-size: 0.9rem;
    }

    .info-list {
        list-style: none;
        padding: 0;
        margin: 1.5rem 0 0 0;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding-top: 1.25rem;
    }

    .info-list li {
        margin-bottom: 0.85rem;
        color: #94a3b8;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
    }

    .info-list li i {
        color: #2dd4bf;
        font-size: 1.1rem;
        width: 28px;
    }

    .info-list li strong {
        color: #f8fafc;
        margin-left: 0.25rem;
    }

    /* Tech Stack Badges */
    .tech-badge {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #e2e8f0;
        padding: 0.35rem 0.85rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
        margin-right: 0.4rem;
        margin-bottom: 0.5rem;
    }
</style>

<div class="page-wrapper">
    <div class="container">

        <!-- Top Navigation Bar Info -->
        <div class="top-actions">
          
            <div class="version-badge">
                <i class="bi bi-shield-check me-1"></i> Version 1.0.0
            </div>
        </div>

        <!-- Banner Judul Halaman -->
        <div class="hero-banner d-flex align-items-center">
            <div class="hero-icon-box me-3">
                <i class="bi bi-person-vcard-fill"></i>
            </div>
            <div>
                <h2 class="fw-bold text-white mb-0">Tentang Pengembang & Aplikasi</h2>
                <p class="text-muted mb-0" style="color: #94a3b8 !important;">Informasi biodata pembuat dan spesifikasi sistem POS</p>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="row g-4">
            
            <!-- Kolom Pengembang -->
            <div class="col-lg-5">
                <div class="custom-card text-center">
                    <div class="profile-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <h3 class="fw-bold text-white mb-2">Nama Pengembang</h3>
                    <div class="mb-3">
                        <span class="name-badge">Kikan Taruna</span>
                    </div>

                    <ul class="info-list text-start">
                        <li>
                            <i class="bi bi-building me-2"></i> Kelas: <strong class="ms-1">XII Rekayasa Perangkat Lunak</strong>
                        </li>
                        <li>
                            <i class="bi bi-envelope me-2"></i> Email: <strong class="ms-1">kikantaruna@gmail.com</strong>
                        </li>
                        <li>
                            <i class="bi bi-geo-alt me-2"></i> Lokasi: <strong class="ms-1">Indonesia</strong>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kolom Sistem POS -->
            <div class="col-lg-7">
                <div class="custom-card d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-laptop text-teal me-2 fs-4" style="color: #2dd4bf;"></i>
                            <h4 class="fw-bold text-white mb-0">Ringkasan Sistem POS</h4>
                        </div>
                        <p style="color: #94a3b8; line-height: 1.6;" class="mb-4">
                            Aplikasi Point of Sale (POS) ini dirancang khusus untuk mengelola data barang, mencatat setiap transaksi penjualan, serta memfasilitasi manajemen hak akses pengguna (Admin & Kasir) secara efektif.
                        </p>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-tools text-teal me-2 fs-5" style="color: #2dd4bf;"></i>
                            <h5 class="fw-bold text-white mb-0">Teknologi Digunakan</h5>
                        </div>
                        <div class="mb-4">
                            <span class="tech-badge">Laravel</span>
                            <span class="tech-badge">PHP 8.x</span>
                            <span class="tech-badge">MySQL</span>
                            <span class="tech-badge">Bootstrap 5</span>
                            <span class="tech-badge">Blade Template</span>
                        </div>
                    </div>

                    <div class="border-top pt-3" style="border-color: rgba(255, 255, 255, 0.08) !important;">
                        <p class="small text-muted mb-0" style="color: #64748b !important;">
                            Dibuat untuk Sistem Informasi Penjualan (POS) • {{ date('Y') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection