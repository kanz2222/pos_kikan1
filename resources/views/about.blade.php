@extends('layouts.app') {{-- Sesuaikan nama layout utama --}}

@section('content')
<div class="container my-5 text-white">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- Tombol Kembali ke Dashboard & Title Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-emerald d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
                <span class="badge bg-slate border border-secondary text-emerald px-3 py-2">
                    <i class="bi bi-shield-check me-1"></i> Version 1.0.0
                </span>
            </div>

            <!-- Header Card -->
            <div class="card bg-dark border-secondary p-4 shadow-lg mb-4">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-person-badge-fill text-emerald display-5"></i>
                    <div>
                        <h2 class="mb-1 fw-bold text-white">Tentang Pengembang & Aplikasi</h2>
                        <p class="text-secondary mb-0">Informasi biodata pembuat dan spesifikasi sistem POS</p>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="row g-4">
                <!-- Card Biodata (Teks dipaksa putih murni) -->
                <div class="col-md-5">
                    <div class="card bg-dark border-secondary p-4 h-100 shadow-sm text-center">
                        <div class="mb-3">
                            <div class="profile-avatar mx-auto d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-fill display-3 text-emerald"></i>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-1 text-white">Nama Pengembang</h4>
                        <span class="badge bg-emerald text-dark fw-bold mb-3">Kikan Taruna</span>
                        
                        <div class="text-start border-top border-secondary pt-3 mt-2 fs-6">
                            <p class="mb-2 text-white">
                                <i class="bi bi-building text-emerald me-2"></i>
                                <strong class="text-emerald">Kelas:</strong> <span class="text-light">XII Rekayasa Perangkat Lunak</span>
                            </p>
                            <p class="mb-2 text-white">
                                <i class="bi bi-envelope text-emerald me-2"></i>
                                <strong class="text-emerald">Email:</strong> <span class="text-light">kikantaruna@gmail.com</span>
                            </p>
                            <p class="mb-0 text-white">
                                <i class="bi bi-geo-alt text-emerald me-2"></i>
                                <strong class="text-emerald">Lokasi:</strong> <span class="text-light">Indonesia</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Detail Sistem -->
                <div class="col-md-7">
                    <div class="card bg-dark border-secondary p-4 h-100 shadow-sm">
                        <h4 class="fw-bold text-emerald mb-3">
                            <i class="bi bi-laptop me-2"></i> Ringkasan Sistem POS
                        </h4>
                        <p class="text-light lead fs-6">
                            Aplikasi Point of Sale (POS) ini dirancang khusus untuk mengelola data barang, mencatat setiap transaksi penjualan, serta memfasilitasi manajemen hak akses pengguna (Admin & Kasir) secara efektif.
                        </p>

                        <div class="mt-4">
                            <h5 class="fw-bold text-white mb-2"><i class="bi bi-tools text-emerald me-2"></i> Teknologi Digunakan</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-slate border border-emerald text-white">Laravel</span>
                                <span class="badge bg-slate border border-emerald text-white">PHP 8.x</span>
                                <span class="badge bg-slate border border-emerald text-white">MySQL</span>
                                <span class="badge bg-slate border border-emerald text-white">Bootstrap 5</span>
                                <span class="badge bg-slate border border-emerald text-white">Blade Template</span>
                            </div>
                        </div>

                        <div class="mt-auto pt-4 border-top border-secondary">
                            <p class="text-secondary small mb-0">Dibuat untuk Sistem Informasi Penjualan (POS) &bull; 2026</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Styling Khusus untuk Memperjelas Warna dan Tombol -->
<style>
    .text-emerald {
        color: #34d399 !important;
    }
    .bg-emerald {
        background-color: #10b981 !important;
    }
    .bg-slate {
        background-color: #0f172a !important;
    }
    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #0f172a;
        border: 2px solid #10b981;
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.3);
    }
    .btn-outline-emerald {
        color: #34d399;
        border-color: #10b981;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .btn-outline-emerald:hover {
        background-color: #10b981;
        color: #ffffff;
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.4);
    }
</style>
@endsection