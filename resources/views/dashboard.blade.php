@extends('layouts.app')

@section('title', 'Ringkasan Hari Ini')

@section('content')

@include('layouts.navbar')

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

    .dashboard-header {
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

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #6366f1 50%, #ec4899 100%);
    }

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
        background: #10b981;
        border-radius: 2px;
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

    .card-header-custom {
        background: rgba(11, 19, 41, 0.95);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        font-weight: 700;
        padding: 1.2rem 1.5rem;
        color: #f8fafc;
    }

    .stat-value {
        font-weight: 800;
        font-size: 1.85rem;
        letter-spacing: -0.5px;
        color: #f8fafc;
    }

    /* Table Styling Overrides (Fix Background Putih Bootstrap) */
    .table-custom {
        --bs-table-bg: transparent !important;
        --bs-table-accent-bg: transparent !important;
        --bs-table-striped-bg: transparent !important;
        background-color: transparent !important;
        color: #cbd5e1 !important;
        margin-bottom: 0;
    }

    .table-custom thead {
        background-color: #0b1329 !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .table-custom thead th {
        border: none;
        font-weight: 700;
        letter-spacing: 0.75px;
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #94a3b8 !important;
        padding: 1rem 1.25rem;
        background-color: #0b1329 !important;
    }

    .table-custom tbody tr {
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(19, 27, 46, 0.8) !important;
    }

    .table-custom td {
        padding: 1rem 1.25rem;
        border: none;
        background-color: transparent !important;
        color: #e2e8f0 !important;
    }

    /* Badges */
    .badge-stock-low {
        background: rgba(245, 158, 11, 0.15);
        color: #fbbf24;
        border: 1px solid rgba(245, 158, 11, 0.3);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .badge-stock-empty {
        background: rgba(239, 68, 68, 0.15);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .badge-best-seller {
        background: rgba(16, 185, 129, 0.15);
        color: #34d399;
        border: 1px solid rgba(16, 185, 129, 0.3);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    /* Styling Komponen Pagination */
    .pagination .page-link {
        background-color: rgba(11, 19, 41, 0.8) !important;
        border-color: rgba(52, 211, 153, 0.2) !important;
        color: #94a3b8 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #10b981 !important;
        border-color: #10b981 !important;
        color: #ffffff !important;
    }

    .pagination .page-link:hover {
        background-color: rgba(16, 185, 129, 0.2) !important;
        color: #34d399 !important;
    }

    .pagination .page-item.disabled .page-link {
        background-color: rgba(11, 19, 41, 0.4) !important;
        color: #475569 !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <div class="dashboard-header text-center">
            <h1 class="display-6 fw-bold mb-2" style="color: #f8fafc;">Ringkasan Hari Ini</h1>
            <p class="fs-6 mb-0" style="color: #94a3b8;">
                <i class="bi bi-calendar-check text-success me-2" style="color: #10b981 !important;"></i>{{ $tanggalHariIni->translatedFormat('l, d F Y') }}
            </p>
        </div>

        @can('__viewAny', App\Models\User::class)
        <div class="mb-5">
            <h2 class="section-title"><i class="bi bi-graph-up-arrow text-success" style="color: #10b981 !important;"></i> Penjualan Hari Ini</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase" style="color: #f8fafc;"><i class="bi bi-wallet2 text-success me-2" style="color: #10b981 !important;"></i> Total Nilai Penjualan</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase" style="color: #f8fafc;"><i class="bi bi-receipt text-indigo-400 me-2" style="color: #6366f1;"></i> Jumlah Transaksi</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value">{{ number_format($ringkasan['total_transaksi'], 0, ',', '.') }} <span class="fs-5 fw-normal" style="color: #94a3b8;">Penjualan</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h2 class="section-title"><i class="bi bi-credit-card-2-back text-success" style="color: #10b981 !important;"></i> Tunai & Status Pembayaran</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase" style="color: #f8fafc;"><i class="bi bi-cash-stack text-success me-2" style="color: #34d399 !important;"></i> Total Pembayaran Tunai</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value" style="color: #34d399 !important;">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card custom-card text-center h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase" style="color: #f8fafc;"><i class="bi bi-qr-code-scan text-pink-400 me-2" style="color: #ec4899;"></i> Total Pembayaran Non-Tunai</h6>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center py-4">
                            <div class="stat-value" style="color: #ec4899 !important;">Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        <div class="mb-5">
            <h2 class="section-title"><i class="bi bi-box-seam text-success" style="color: #10b981 !important;"></i> Status Persediaan Kritis</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card custom-card h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase" style="color: #fbbf24;"><i class="bi bi-exclamation-triangle-fill me-2"></i> Stok Menipis</h6>
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
                                            <td class="ps-4 font-monospace" style="color: #94a3b8;">{{ $produkStokRendah->firstItem() + $index }}</td>
                                            <td class="fw-semibold" style="color: #f8fafc;">{{ $produk->nama }}</td>
                                            <td class="text-center">
                                                <span class="badge-stock-low">{{ $produk->stok }} pcs</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4" style="color: #94a3b8;">
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

                <div class="col-md-6">
                    <div class="card custom-card h-100">
                        <div class="card-header-custom">
                            <h6 class="mb-0 fw-bold text-uppercase" style="color: #f87171;"><i class="bi bi-x-octagon-fill me-2"></i> Stok Habis</h6>
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
                                            <td class="ps-4 font-monospace" style="color: #94a3b8;">{{ $produkStokHabis->firstItem() + $index }}</td>
                                            <td class="fw-semibold" style="color: #f8fafc;">{{ $produk->nama }}</td>
                                            <td class="text-center">
                                                <span class="badge-stock-empty">0 pcs</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4" style="color: #94a3b8;">
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

        <div class="mb-4">
            <h2 class="section-title"><i class="bi bi-trophy text-success" style="color: #10b981 !important;"></i> Produk Terlaris</h2>
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
                                    <td class="ps-4 fw-bold" style="color: #f8fafc;">{{ $produk->nama }}</td>
                                    <td style="color: #94a3b8;">{{ $produk->stok }} pcs</td>
                                    <td class="text-center">
                                        <span class="badge-best-seller"><i class="bi bi-fire me-1"></i>{{ $produk->total_terjual }} terjual</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4" style="color: #94a3b8;">
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