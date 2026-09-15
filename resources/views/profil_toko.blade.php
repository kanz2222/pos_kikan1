@extends('layouts.app')

@section('title', 'Profil Toko - KANZZ STORE')

@push('styles')
<style>
    body {
        background-color: #0f172a;
        color: #f8fafc;
    }
    .card-custom {
        background-color: #1e293b;
        border: 1px solid #334155;
        border-radius: 12px;
    }
    .badge-custom {
        background-color: #0ea5e9;
        color: #fff;
    }
    .feature-icon {
        font-size: 2rem;
        color: #38bdf8;
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <!-- Header Banner -->
    <div class="card card-custom p-4 mb-4 text-center">
        <h1 class="fw-bold text-info">KANZZ STORE</h1>
        <p class="text-muted mb-0">Sistem Kasir & Manajemen Penjualan Terpercaya</p>
    </div>

    <div class="row g-4">
        <!-- Tentang Toko -->
        <div class="col-md-7">
            <div class="card card-custom h-100 p-4">
                <h4 class="fw-bold mb-3 text-light">Tentang Kami</h4>
                <p class="text-secondary">
                    <strong>KANZZ STORE</strong> adalah platform yang menyediakan solusi transaksi dan manajemen stok barang secara modern, efisien, dan transparan. Kami berkomitmen memberikan layanan terbaik dengan pencatatan penjualan yang akurat dan real-time.
                </p>
                
                <h5 class="fw-bold mt-4 mb-3 text-light">Keunggulan KANZZ STORE</h5>
                <ul class="list-unstyled text-secondary">
                    <li class="mb-2">✔ Transaksi Cepat & Pembayaran Non-Tunai / Tunai</li>
                    <li class="mb-2">✔ Laporan Penjualan Harian Real-time</li>
                    <li class="mb-2">✔ Pemantauan Stok Menipis & Stok Habis Otomatis</li>
                    <li class="mb-2">✔ Keamanan Data Transaksi Terjamin</li>
                </ul>
            </div>
        </div>

        <!-- Detail Informasi & Kontak -->
        <div class="col-md-5">
            <div class="card card-custom h-100 p-4">
                <h4 class="fw-bold mb-3 text-light">Informasi Toko</h4>
                
                <div class="mb-3">
                    <span class="text-muted d-block small">Nama Toko</span>
                    <span class="fw-semibold text-light">KANZZ STORE</span>
                </div>

                <div class="mb-3">
                    <span class="text-muted d-block small">Status Operasional</span>
                    <span class="badge bg-success">Aktif / Buka</span>
                </div>

                <div class="mb-3">
                    <span class="text-muted d-block small">Metode Pembayaran</span>
                    <span class="text-light">Tunai, QRIS, Transfer Bank</span>
                </div>

                <div class="mb-3">
                    <span class="text-muted d-block small">Alamat</span>
                    <span class="text-light">Jl. Raya Utama No. 123, Indonesia</span>
                </div>

                <div class="mb-3">
                    <span class="text-muted d-block small">Kontak / WhatsApp</span>
                    <span class="text-light">+62 812-3456-7890</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection