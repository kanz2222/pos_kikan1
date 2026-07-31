@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background-color: #060a12;
        background-image: radial-gradient(circle at 10% 20%, rgba(0, 210, 133, 0.05) 0%, transparent 40%),
                          radial-gradient(circle at 90% 80%, rgba(13, 110, 253, 0.05) 0%, transparent 40%);
        color: #f8fafc;
    }

    .page-wrapper {
        min-height: 100vh;
        padding: 2.5rem 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Hero Banner Dark Theme */
    .hero-banner-sale {
        background: #0b1329;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        color: #ffffff;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .hero-banner-sale::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #00d285 0%, #0d6efd 50%, #d63384 100%);
    }

    .hero-banner-sale .text-muted-custom {
        color: #94a3b8 !important;
    }

    /* Cards Dark Theme */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        background: #0b1329;
        overflow: hidden;
        transition: all 0.25s ease-in-out;
    }

    .custom-card:hover {
        border-color: rgba(0, 210, 133, 0.3);
    }

    /* Search Box Dark Theme */
    .search-box {
        background: #0b1329;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
    }

    .search-input-group {
        background-color: #060a12 !important;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 8px;
        overflow: hidden;
    }

    .search-input-group input {
        background-color: #060a12 !important;
        color: #f8fafc !important;
    }

    .search-input-group input::placeholder {
        color: #64748b;
    }

    .search-input-group .input-group-text {
        background-color: #060a12 !important;
        border: none;
        color: #64748b;
    }

    /* Table Styling Overrides (Fixing White Backgrounds) */
    .table-custom {
        --bs-table-bg: transparent !important;
        --bs-table-accent-bg: transparent !important;
        --bs-table-striped-bg: transparent !important;
        background-color: transparent !important;
        color: #cbd5e1 !important;
        margin-bottom: 0;
    }

    .table-custom thead {
        background-color: #0d1730 !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .table-custom thead th {
        border: none;
        font-weight: 700;
        letter-spacing: 0.75px;
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #64748b !important;
        padding: 1.1rem 1.25rem;
        background-color: #0d1730 !important;
    }

    .table-custom tbody tr {
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.02) !important;
    }

    .table-custom td {
        padding: 1.1rem 1.25rem;
        border: none;
        background-color: transparent !important;
        color: #e2e8f0 !important;
    }

    /* Badges */
    .badge-tag-header {
        background-color: rgba(0, 210, 133, 0.12) !important;
        color: #00d285 !important;
        border: 1px solid rgba(0, 210, 133, 0.3);
    }

    .badge-total-bayar {
        background-color: rgba(0, 210, 133, 0.12);
        color: #00d285;
        border: 1px solid rgba(0, 210, 133, 0.25);
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .badge-method {
        background: rgba(13, 110, 253, 0.12);
        color: #6ea8fe;
        border: 1px solid rgba(13, 110, 253, 0.25);
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .badge-status {
        background: rgba(111, 66, 193, 0.12);
        color: #c599ff;
        border: 1px solid rgba(111, 66, 193, 0.25);
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    /* Buttons Dark Modern Theme */
    .btn-create-sale {
        background-color: #00d285;
        color: #060a12;
        font-weight: 700;
        border-radius: 8px;
        border: none;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 210, 133, 0.25);
        transition: all 0.2s ease-in-out;
    }

    .btn-create-sale:hover {
        background-color: #00b874;
        color: #060a12;
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(0, 210, 133, 0.35);
    }

    .btn-search-custom {
        background-color: #00d285;
        color: #060a12;
        font-weight: 700;
        border: none;
        border-radius: 6px !important;
    }

    .btn-search-custom:hover {
        background-color: #00b874;
        color: #060a12;
    }

    .btn-detail-custom {
        background: rgba(13, 202, 240, 0.12);
        border: 1px solid rgba(13, 202, 240, 0.3);
        color: #6edff6;
        font-weight: 600;
        border-radius: 6px;
        padding: 5px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-detail-custom:hover {
        background-color: #0dcaf0;
        color: #000000;
    }

    .btn-edit-custom {
        background: rgba(255, 193, 7, 0.12);
        border: 1px solid rgba(255, 193, 7, 0.3);
        color: #ffda6a;
        font-weight: 600;
        border-radius: 6px;
        padding: 5px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-edit-custom:hover {
        background-color: #ffc107;
        color: #000000;
    }

    .btn-delete-custom {
        background: rgba(220, 53, 69, 0.12);
        border: 1px solid rgba(220, 53, 69, 0.3);
        color: #ea868f;
        font-weight: 600;
        border-radius: 6px;
        padding: 5px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-delete-custom:hover {
        background-color: #dc3545;
        color: #ffffff;
    }

    /* Custom Pagination Styling */
    .pagination .page-link {
        background-color: #0b1329 !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
        color: #94a3b8 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #00d285 !important;
        border-color: #00d285 !important;
        color: #060a12 !important;
        font-weight: bold;
    }

    .pagination .page-link:hover {
        background-color: rgba(0, 210, 133, 0.15) !important;
        color: #00d285 !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">

        @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert" style="background-color: rgba(220, 53, 69, 0.15); border: 1px solid rgba(220, 53, 69, 0.3); color: #ea868f;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('errors') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="hero-banner-sale p-4 p-md-5 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge badge-tag-header px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm">
                    <i class="bi bi-receipt-cutoff me-1"></i> Laporan Transaksi
                </span>
                <h1 class="display-6 fw-bold mb-1 text-white">Halaman Penjualan</h1>
                <p class="text-muted-custom mb-0 fw-semibold">Kelola dan pantau seluruh transaksi penjualan harian dengan mudah.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('penjualan.create') }}" class="btn btn-create-sale btn-lg shadow-sm px-4">
                    <i class="bi bi-plus-circle-fill me-2"></i> Tambah Penjualan
                </a>
            </div>
        </div>

        <div class="card custom-card p-3 mb-4 search-box">
            <form action="{{ route('penjualan.index') }}" method="GET">
                <div class="input-group search-input-group p-1">
                    <span class="input-group-text ps-3">
                        <i class="bi bi-search"></i>
                    </span>
                    <input 
                        type="text"
                        name="search"
                        value="{{ request()->search }}"
                        class="form-control border-0 py-2 px-2"
                        placeholder="Search penjualan..."
                    >
                    <button class="btn btn-search-custom px-4 ms-2" type="submit">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('penjualan.index') }}" class="btn btn-outline-light px-3 ms-2 d-flex align-items-center" style="border-color: rgba(255,255,255,0.15); color: #94a3b8;">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="card custom-card">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="ps-4 py-3">#</th>
                            <th scope="col" class="py-3">Tanggal Transaksi</th>
                            <th scope="col" class="py-3">Kasir</th>
                            <th scope="col" class="py-3">Total Pembayaran</th>
                            <th scope="col" class="py-3">Metode Pembayaran</th>
                            <th scope="col" class="py-3">Status</th>
                            <th scope="col" class="py-3 text-center">Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @forelse($sales as $sale)
                        <tr>
                            <th scope="row" class="ps-4 fw-bold" style="color: #64748b;">{{ $sales->firstItem() + $loop->index }}</th>
                            <td>
                                <span class="fw-semibold text-white"><i class="bi bi-calendar-event me-1" style="color: #00d285;"></i> {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</span>
                            </td>
                            <td>
                                <span class="fw-bold text-white"><i class="bi bi-person-badge me-1" style="color: #00d285;"></i> {{ $sale->user->name }}</span>
                            </td>
                            <td>
                                <span class="badge-total-bayar">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge-method">{{ $sale->metode_pembayaran }}</span>
                            </td>
                            <td>
                                <span class="badge-status">{{ $sale->status }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1 align-items-center justify-content-center">
                                    <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-detail-custom btn-sm">
                                        <i class="bi bi-eye-fill me-1"></i> Detail
                                    </a>
                                    
                                    @can('update', $sale)
                                    <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-edit-custom btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    @endcan
                                    
                                    @can('delete', $sale)
                                    <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete-custom btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
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
                                <div class="fs-5" style="color: #64748b;">
                                    <i class="bi bi-inbox fs-1 d-block mb-2" style="color: #00d285;"></i> 
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-transparent border-0 py-4 px-4">
                <div class="d-flex justify-content-center justify-content-md-end">
                    {{ $sales->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection