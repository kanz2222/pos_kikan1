@extends('layouts.app')

@section('title', 'Daftar Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #0d322b 0%, #0f172a 50%, #1e1b4b 100%);
        background-attachment: fixed;
        color: #f8fafc;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .page-wrapper {
        background: linear-gradient(135deg, #0d322b 0%, #0f172a 50%, #1e1b4b 100%);
        background-attachment: fixed;
        min-height: 100vh;
        padding: 2.5rem 0;
    }

    /* Hero Banner Base Style */
    .hero-banner-sale {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        color: #ffffff;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        margin-bottom: 2rem;
        backdrop-filter: blur(12px);
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Animasi Bar Gradasi Atas */
    .hero-banner-sale::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #ec4899 100%);
        background-size: 200% 100%;
        animation: gradientShift 6s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-banner-sale h1 {
        color: #ffffff !important;
    }

    .hero-banner-sale p {
        color: #94a3b8 !important;
    }

    /* Custom Cards */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        background: #0f172a;
        backdrop-filter: blur(12px);
        overflow: hidden;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .custom-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #ec4899 100%);
        background-size: 200% 100%;
        animation: gradientShift 6s ease infinite;
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-3px);
        border-color: rgba(16, 185, 129, 0.5);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5), 0 0 20px rgba(16, 185, 129, 0.25);
    }

    .custom-card:hover::before {
        opacity: 1;
    }

    /* Search Inputs & Buttons */
    .search-input {
        border-radius: 10px;
        padding: 0.75rem 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background-color: #1e293b;
        color: #ffffff;
        transition: all 0.25s ease;
    }

    .search-input:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
        background-color: #1e293b;
        color: #ffffff;
    }

    .search-input::placeholder {
        color: #64748b;
    }

    .btn-search-custom {
        background: #10b981;
        border: none;
        color: #000000;
        font-weight: 600;
        border-radius: 10px;
        padding: 0.75rem 1.25rem;
        transition: all 0.2s ease;
    }

    .btn-search-custom:hover {
        background: #059669;
        color: #ffffff;
    }

    /* Table Styling */
    .table-custom {
        color: #f8fafc;
        background-color: transparent !important;
        margin-bottom: 0;
    }

    .table-custom thead {
        background: #1e293b !important;
    }

    .table-custom thead th {
        border: none;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.75px;
        color: #94a3b8 !important;
        background-color: #1e293b !important;
        padding: 1.1rem 1.25rem;
    }

    .table-custom tbody tr {
        transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.03) !important;
    }

    /* Override background bawaan Bootstrap pada th/td */
    .table-custom th,
    .table-custom td {
        border-color: rgba(255, 255, 255, 0.05) !important;
        color: #e2e8f0 !important;
        background-color: transparent !important;
        padding: 1.1rem 1.25rem;
    }

    /* Badges */
    .badge-total-bayar {
        background-color: rgba(16, 185, 129, 0.15);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .badge-method {
        background: rgba(6, 182, 212, 0.15);
        color: #22d3ee;
        border: 1px solid rgba(6, 182, 212, 0.3);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .badge-status {
        background: rgba(168, 85, 247, 0.15);
        color: #c084fc;
        border: 1px solid rgba(168, 85, 247, 0.3);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    /* Buttons */
    .btn-create-sale {
        background: #10b981;
        border: none;
        color: #000000;
        font-weight: 700;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.25s ease-in-out;
    }

    .btn-create-sale:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
    }

    .btn-action-custom {
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-detail-custom {
        background: rgba(6, 182, 212, 0.15);
        border: 1px solid rgba(6, 182, 212, 0.3);
        color: #22d3ee;
    }

    .btn-detail-custom:hover {
        background: #0891b2;
        color: #ffffff;
    }

    .btn-edit-custom {
        background: rgba(245, 158, 11, 0.15);
        border: 1px solid rgba(245, 158, 11, 0.3);
        color: #fbbf24;
    }

    .btn-edit-custom:hover {
        background: #d97706;
        color: #ffffff;
    }

    .btn-delete-custom {
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #f87171;
    }

    .btn-delete-custom:hover {
        background: #dc2626;
        color: #ffffff;
    }

    /* Pagination */
    .pagination .page-link {
        background-color: #1e293b !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: #94a3b8 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #10b981 !important;
        border-color: #10b981 !important;
        color: #000000 !important;
        font-weight: bold;
    }

    .pagination .page-link:hover {
        background-color: rgba(16, 185, 129, 0.25) !important;
        color: #10b981 !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-12 shadow-sm mb-4" role="alert" style="background: rgba(16, 185, 129, 0.2); color: #6ee7b7; border: 1px solid rgba(16, 185, 129, 0.3);">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error') || session('errors'))
            <div class="alert alert-danger alert-dismissible fade show rounded-12 shadow-sm mb-4" role="alert" style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3);">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') ?? session('errors') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        {{-- Hero Banner --}}
        <div class="hero-banner-sale p-4 p-md-4 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: #10b981; color: #000000;">
                    <i class="bi bi-receipt-cutoff me-1"></i> Laporan Transaksi
                </span>
                <h1 class="h3 fw-bold mb-1">Daftar Penjualan</h1>
                <p class="mb-0 small">Kelola dan pantau seluruh transaksi penjualan harian dengan mudah.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('penjualan.create') }}" class="btn btn-create-sale shadow-sm px-4">
                    <i class="bi bi-plus-lg me-1"></i> Transaksi Baru
                </a>
            </div>
        </div>

        {{-- Form Pencarian --}}
        <div class="card custom-card p-3 mb-4">
            <form action="{{ route('penjualan.index') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text search-input border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input 
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control search-input border-start-0 ps-0"
                        placeholder="Cari transaksi berdasarkan nama kasir atau ID..."
                    >
                    <button class="btn btn-search-custom ms-2" type="submit">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('penjualan.index') }}" class="btn btn-outline-light ms-2 d-flex align-items-center rounded-10">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tabel Data Penjualan --}}
        <div class="card custom-card">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="ps-4">#</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Kasir</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @forelse($sales as $sale)
                        <tr>
                            <td class="ps-4 fw-bold" style="color: #64748b;">
                                {{ $sales->firstItem() + $loop->index }}
                            </td>
                            <td>
                                <span class="fw-semibold text-light">
                                    <i class="bi bi-calendar-event me-1 text-primary"></i> 
                                    {{ $sale->created_at ? $sale->created_at->translatedFormat('d-m-Y H:i:s') : '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold text-light">
                                    <i class="bi bi-person-badge me-1 text-primary"></i> 
                                    {{ $sale->user->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge-total-bayar">Rp {{ number_format($sale->total_pembayaran ?? 0, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge-method">{{ $sale->metode_pembayaran ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="badge-status">{{ $sale->status ?? '-' }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1 align-items-center justify-content-center">
                                    <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-action-custom btn-detail-custom">
                                        <i class="bi bi-eye-fill me-1"></i> Detail
                                    </a>
                                    
                                    @can('update', $sale)
                                    <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-action-custom btn-edit-custom">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    @endcan
                                    
                                    @can('delete', $sale)
                                    <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-action-custom btn-delete-custom" onclick="return confirm('Apakah Anda yakin ingin menghapus penjualan ini?')">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-primary"></i> 
                                    Data Transaksi Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-transparent border-0 py-3 px-4">
                <div class="d-flex justify-content-center justify-content-md-end">
                    {{ $sales->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection