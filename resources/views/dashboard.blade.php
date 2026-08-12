@extends('layouts.app')

@section('title', 'Ringkasan Hari Ini')

@push('styles')
<style>
    /* Latar Belakang Warna-Warni Bergerak Dinamis */
    body {
        background: #224248;
       
        animation: rainbowGradient 15s ease infinite;
        background-attachment: fixed;
        color: #f8fafc;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        overflow-x: hidden;
    }

    .page-wrapper {
        position: relative;
        min-height: 100vh;
        padding: 2.5rem 0;
        z-index: 1;
    }

    /* Efek Bola-Bola Pendar Warna-Warni Melayang di Latar Belakang */
    .page-wrapper::before,
    .page-wrapper::after {
        content: '';
        position: fixed;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.35;
        z-index: -1;
        animation: floatOrb 10s ease-in-out infinite alternate;
    }

    .page-wrapper::before {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, #34d399 0%, #3b82f6 100%);
        top: 5%;
        left: -80px;
    }

    .page-wrapper::after {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #ec4899 0%, #8b5cf6 100%);
        bottom: 5%;
        right: -100px;
        animation-delay: -5s;
    }

    /* Dashboard Header Utama */
    .dashboard-header {
        background: rgba(13, 19, 33, 0.82);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        color: #f8fafc;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        margin-bottom: 2.5rem;
        backdrop-filter: blur(14px);
        position: relative;
        overflow: hidden;
    }

    /* Garis Aksen Warna-Warni Bergerak di Atas Header */
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981, #3b82f6, #ec4899, #f59e0b, #10b981);
        background-size: 300% 300%;
        animation: rainbowLine 4s linear infinite;
    }

    /* Judul Bagian / Section Title */
    .section-title {
        font-weight: 800;
        color: #f8fafc;
        font-size: 1.25rem;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, #10b981, #3b82f6);
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .section-title:hover::after {
        width: 90px;
    }

    /* Card Container Glassmorphism */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        background: rgba(13, 19, 33, 0.85) !important;
        backdrop-filter: blur(14px);
        overflow: hidden;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), 
                    border-color 0.3s ease, 
                    box-shadow 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-6px) scale(1.01);
        border-color: rgba(52, 211, 153, 0.5);
        box-shadow: 0 18px 35px rgba(0, 0, 0, 0.6), 0 0 25px rgba(52, 211, 153, 0.2);
    }

    .card-header-custom {
        background: rgba(11, 19, 41, 0.95);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-weight: 700;
        padding: 1.2rem 1.5rem;
        color: #f8fafc;
    }

    .stat-value {
        font-weight: 800;
        font-size: 1.85rem;
        letter-spacing: -0.5px;
        color: #f8fafc;
        transition: transform 0.3s ease;
    }

    .custom-card:hover .stat-value {
        transform: scale(1.05);
    }

    /* Class Tambahan Warna Stat */
    .text-emerald { color: #10b981 !important; }
    .text-light-green { color: #34d399 !important; }
    .text-pink-custom { color: #f472b6 !important; }
    .text-indigo-custom { color: #818cf8 !important; }
    .text-muted-custom { color: #94a3b8 !important; }
    .text-warning-custom { color: #fbbf24 !important; }
    .text-danger-custom { color: #f87171 !important; }

    /* Table Styling Overrides */
    .table-custom {
        --bs-table-bg: transparent !important;
        --bs-table-accent-bg: transparent !important;
        --bs-table-striped-bg: transparent !important;
        background-color: transparent !important;
        color: #cbd5e1 !important;
        margin-bottom: 0;
    }

    .table-custom thead {
        background-color: rgba(11, 19, 41, 0.95) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .table-custom thead th {
        border: none;
        font-weight: 700;
        letter-spacing: 0.75px;
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #94a3b8 !important;
        padding: 1rem 1.25rem;
        background-color: rgba(11, 19, 41, 0.95) !important;
    }

    .table-custom tbody tr {
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background-color 0.25s ease, transform 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.06) !important;
    }

    .table-custom td {
        padding: 1rem 1.25rem;
        border: none;
        background-color: transparent !important;
        color: #e2e8f0 !important;
    }

    /* Badges & Pulsing Animations */
    .badge-stock-low {
        background: rgba(245, 158, 11, 0.18);
        color: #fbbf24;
        border: 1px solid rgba(245, 158, 11, 0.35);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-block;
        animation: pulseWarning 2s infinite;
    }

    .badge-stock-empty {
        background: rgba(239, 68, 68, 0.18);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.35);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-block;
        animation: pulseDanger 1.5s infinite;
    }

    .badge-best-seller {
        background: rgba(16, 185, 129, 0.18);
        color: #34d399;
        border: 1px solid rgba(16, 185, 129, 0.35);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-block;
    }

    .animate-icon {
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .custom-card:hover .animate-icon,
    .section-title:hover .animate-icon {
        transform: rotate(12deg) scale(1.15);
    }

    /* Styling Komponen Pagination */
    .pagination .page-link {
        background-color: rgba(11, 19, 41, 0.8) !important;
        border-color: rgba(255, 255, 255, 0.15) !important;
        color: #94a3b8 !important;
        transition: all 0.2s ease;
    }

    .pagination .page-item.active .page-link {
        background-color: #10b981 !important;
        border-color: #10b981 !important;
        color: #ffffff !important;
        box-shadow: 0 0 12px rgba(16, 185, 129, 0.5);
    }

    .pagination .page-link:hover {
        background-color: rgba(16, 185, 129, 0.2) !important;
        color: #34d399 !important;
        transform: translateY(-2px);
    }

    .pagination .page-item.disabled .page-link {
        background-color: rgba(11, 19, 41, 0.4) !important;
        color: #475569 !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }

    /* Keyframe Animations */
    @keyframes rainbowGradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes rainbowLine {
        0% { background-position: 0% 50%; }
        100% { background-position: 300% 50%; }
    }

    @keyframes floatOrb {
        0% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(70px, 50px) scale(1.2); }
        100% { transform: translate(-50px, 90px) scale(0.85); }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulseWarning {
        0% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.4); }
        70% { box-shadow: 0 0 0 8px rgba(245, 158, 11, 0); }
        100% { box-shadow: 0 0 0 0 rgba(245, 158, 11, 0); }
    }

    @keyframes pulseDanger {
        0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.5); }
        70% { box-shadow: 0 0 0 8px rgba(239, 68, 68, 0); }
        100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
    }

    /* Staggered Load Classes */
    .animate-fade-in {
        animation: fadeInUp 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
</style>
@endpush

@section('content')

@include('layouts.navbar')

<div class="page-wrapper">
    <div class="container">
        
        <!-- Dashboard Header -->
        <div class="dashboard-header text-center animate-fade-in">
            <h1 class="display-6 fw-bold mb-2">Ringkasan Hari Ini</h1>
            <p class="fs-6 mb-0 text-muted-custom">
                <i class="bi bi-calendar-check text-emerald me-2 animate-icon"></i>{{ $tanggalHariIni->translatedFormat('l, d F Y') }}
            </p>
        </div>

        @can('__viewAny', App\Models\User::class)
        <!-- Section Penjualan Hari Ini -->
        <div class="mb-5 animate-fade-in delay-1">
            <h2 class="section-title"><i class="bi bi-graph-up-arrow text-emerald animate-icon"></i> Penjualan Hari Ini</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase"><i class="bi bi-wallet2 text-emerald me-2 animate-icon"></i> Total Nilai Penjualan</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase"><i class="bi bi-receipt text-indigo-custom me-2 animate-icon"></i> Jumlah Transaksi</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value">{{ number_format($ringkasan['total_transaksi'], 0, ',', '.') }} <span class="fs-5 fw-normal text-muted-custom">Penjualan</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Tunai & Status Pembayaran -->
        <div class="mb-5 animate-fade-in delay-2">
            <h2 class="section-title"><i class="bi bi-credit-card-2-back text-emerald animate-icon"></i> Tunai & Status Pembayaran</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase"><i class="bi bi-cash-stack text-light-green me-2 animate-icon"></i> Total Pembayaran Tunai</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value text-light-green">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase"><i class="bi bi-qr-code-scan text-pink-custom me-2 animate-icon"></i> Total Pembayaran Non-Tunai</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value text-pink-custom">Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        <!-- Section Status Persediaan Kritis -->
        <div class="mb-5 animate-fade-in delay-3">
            <h2 class="section-title"><i class="bi bi-box-seam text-emerald animate-icon"></i> Status Persediaan Kritis</h2>
            <div class="row g-4">
                <!-- Tabel Stok Menipis -->
                <div class="col-md-6">
                    <div class="card custom-card h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase text-warning-custom"><i class="bi bi-exclamation-triangle-fill me-2 animate-icon"></i> Stok Menipis</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-custom align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="ps-4">#</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col" class="text-center">Sisa Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($produkStokRendah as $index => $produk)
                                        <tr>
                                            <td class="ps-4 font-monospace text-muted-custom">{{ $produkStokRendah->firstItem() + $index }}</td>
                                            <td class="fw-semibold">{{ $produk->nama }}</td>
                                            <td class="text-center">
                                                <span class="badge-stock-low">{{ $produk->stok }} pcs</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-muted-custom">
                                                Seluruh produk berada dalam kondisi stok aman.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 py-3">
                            {{ $produkStokRendah->links() }}
                        </div>
                    </div>
                </div>

                <!-- Tabel Stok Habis -->
                <div class="col-md-6">
                    <div class="card custom-card h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase text-danger-custom"><i class="bi bi-x-octagon-fill me-2 animate-icon"></i> Stok Habis</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-custom align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="ps-4">#</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($produkStokHabis as $index => $produk)
                                        <tr>
                                            <td class="ps-4 font-monospace text-muted-custom">{{ $produkStokHabis->firstItem() + $index }}</td>
                                            <td class="fw-semibold">{{ $produk->nama }}</td>
                                            <td class="text-center">
                                                <span class="badge-stock-empty">0 pcs</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-muted-custom">
                                                Tidak ada produk yang habis.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 py-3">
                            {{ $produkStokHabis->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Produk Terlaris -->
        <div class="mb-4 animate-fade-in delay-4">
            <h2 class="section-title"><i class="bi bi-trophy text-emerald animate-icon"></i> Produk Terlaris</h2>
            <div class="card custom-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="ps-4">Nama Produk</th>
                                    <th scope="col">Sisa Stok</th>
                                    <th scope="col" class="text-center">Total Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkTerlaris as $produk)
                                <tr>
                                    <td class="ps-4 fw-bold">{{ $produk->nama }}</td>
                                    <td class="text-muted-custom">{{ $produk->stok }} pcs</td>
                                    <td class="text-center">
                                        <span class="badge-best-seller"><i class="bi bi-fire me-1"></i>{{ $produk->total_terjual }} terjual</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted-custom">
                                        Belum ada data penjualan produk.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection