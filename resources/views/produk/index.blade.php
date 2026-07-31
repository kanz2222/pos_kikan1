@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background-color: #0b1329;
        color: #f1f5f9;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .page-wrapper {
        background-color: #0b1329;
        min-height: 100vh;
        padding: 2.5rem 0;
    }

    /* Hero Banner Modern Dark */
    .hero-banner-product {
        background: #111c3a;
        border: 1px solid #1e2d53;
        border-radius: 16px;
        color: #ffffff;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .hero-banner-product::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #10b981 0%, #06b6d4 50%, #3b82f6 100%);
    }

    .badge-hero {
        background: rgba(16, 185, 129, 0.15) !important;
        color: #34d399 !important;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    /* Card Box & Search Container */
    .custom-card, .search-box {
        border: 1px solid #1e2d53;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        background: #111c3a !important;
        overflow: hidden;
    }

    .search-input-group {
        background: #0b1329 !important;
        border: 1px solid #1e2d53 !important;
        border-radius: 10px;
        overflow: hidden;
    }

    .search-input {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        border: none !important;
    }

    .search-input::placeholder {
        color: #64748b;
    }

    /* Modern Table Dark Theme - Overriding Bootstrap defaults */
    .table-responsive {
        background-color: #111c3a !important;
    }

    .table-custom {
        color: #cbd5e1 !important;
        margin-bottom: 0;
        --bs-table-bg: transparent !important;
        --bs-table-color: #cbd5e1 !important;
    }

    .table-custom thead {
        background-color: #0b1329 !important;
        border-bottom: 1px solid #1e2d53;
    }

    .table-custom thead th {
        border: none;
        font-weight: 700;
        letter-spacing: 0.75px;
        text-transform: uppercase;
        font-size: 0.75rem;
        color: #64748b !important;
        padding: 1.25rem 1rem;
        background-color: #0b1329 !important;
    }

    .table-custom tbody tr {
        border-bottom: 1px solid #192648;
        transition: background-color 0.2s ease;
        background-color: transparent !important;
    }

    .table-custom tbody tr:hover {
        background-color: #162347 !important;
    }

    .table-custom td, .table-custom th {
        padding: 1rem;
        border: none;
        background-color: transparent !important;
        color: #cbd5e1 !important;
    }

    .product-img {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        border: 1px solid #1e2d53;
    }

    /* Badges Style */
    .badge-price-buy {
        background-color: rgba(59, 130, 246, 0.15);
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.3);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.825rem;
    }

    .badge-price-sell {
        background-color: rgba(16, 185, 129, 0.15);
        color: #34d399;
        border: 1px solid rgba(16, 185, 129, 0.3);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.825rem;
    }

    .badge-stock {
        background: rgba(168, 85, 247, 0.15);
        color: #c084fc;
        border: 1px solid rgba(168, 85, 247, 0.3);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.825rem;
    }

    /* Buttons Style */
    .btn-create-product {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
        font-weight: 600;
        border-radius: 10px;
        border: none;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        transition: all 0.2s ease-in-out;
    }

    .btn-create-product:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }

    .btn-detail-custom {
        background: rgba(6, 182, 212, 0.15);
        border: 1px solid rgba(6, 182, 212, 0.3);
        color: #22d3ee;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .btn-detail-custom:hover {
        background: #0891b2;
        color: #ffffff;
    }

    .btn-edit-custom {
        background: rgba(245, 158, 11, 0.15);
        border: 1px solid rgba(245, 158, 11, 0.3);
        color: #fbbf24;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .btn-edit-custom:hover {
        background: #d97706;
        color: #ffffff;
    }

    .btn-delete-custom {
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #f87171;
        font-weight: 600;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .btn-delete-custom:hover {
        background: #dc2626;
        color: #ffffff;
    }

    /* Fix Pagination Dark Theme Override */
    .pagination .page-link {
        background-color: #0b1329 !important;
        border-color: #1e2d53 !important;
        color: #94a3b8 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #10b981 !important;
        border-color: #10b981 !important;
        color: #ffffff !important;
    }

    .pagination .page-link:hover {
        background-color: #162347 !important;
        color: #38bdf8 !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <div class="hero-banner-product p-4 p-md-5 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge badge-hero px-3 py-2 rounded-pill fw-semibold mb-3">
                    <i class="bi bi-box-seam-fill me-1"></i> Manajemen Inventaris POS
                </span>
                <h1 class="display-6 fw-bold mb-2 text-white">Halaman Produk</h1>
                <p class="mb-0" style="color: #94a3b8;">Kelola daftar item, harga beli, harga jual, stok, dan inventaris sistem POS</p>
            </div>
            <div class="mt-3 mt-md-0">
                @can('create', App\Models\Produk::class)
                <a href="{{ route('produk.create') }}" class="btn btn-create-product btn-lg shadow-sm px-4">
                    <i class="bi bi-plus-circle-fill me-2"></i> Tambah Produk
                </a>
                @endcan
            </div>
        </div>

        {{-- ALERT SECTION --}}
        @if(session('success'))
            <div class="alert alert-success border-0 alert-dismissible fade show shadow-sm mb-4" style="background: rgba(16, 185, 129, 0.2); color: #6ee7b7; border: 1px solid rgba(16, 185, 129, 0.3);" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger border-0 alert-dismissible fade show shadow-sm mb-4" style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3);" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card search-box p-3 mb-4">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group search-input-group p-1">
                    <span class="input-group-text border-0 bg-transparent text-secondary ps-3">
                        <i class="bi bi-search" style="color: #64748b;"></i>
                    </span>
                    <input 
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control search-input py-2 px-2"
                        placeholder="Cari nama produk..."
                    >
                    <button class="btn px-4 fw-semibold" type="submit" style="background: #10b981; color: #ffffff; border-radius: 8px; border: none;">
                        Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-2 px-3 d-flex align-items-center" style="border-radius: 8px; background: #334155; border: none;">
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
                            <th scope="col" class="ps-4">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Stok</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row" class="ps-4 fw-bold" style="color: #64748b;">{{ $products->firstItem() + $loop->index }}</th>
                            <td>
                                <span class="fw-medium" style="color: #e2e8f0;">
                                    <i class="bi bi-person-circle me-1" style="color: #38bdf8;"></i> {{ $product->user->name }}
                                </span>
                            </td>
                            <td>
                                <img src="{{ asset('storage/'.$product->foto) }}" class="product-img" alt="{{ $product->nama }}">
                            </td>
                            <td>
                                <span class="fw-bold fs-6 text-white">{{ $product->nama }}</span>
                            </td>
                            <td>
                                <span class="badge-price-buy">Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge-price-sell">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <span class="badge-stock">{{ $product->stok }} pcs</span>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2 justify-content-center">
                                    <a href="{{ route('produk.show', $product) }}" class="btn btn-detail-custom btn-sm">
                                        <i class="bi bi-eye-fill me-1"></i> Rincian
                                    </a>
                                    
                                    @can('update', $product)
                                    <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit-custom btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    @endcan
                                    
                                    @can('delete', $product)
                                    <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-delete-custom btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="fs-5" style="color: #64748b;">Data tidak tersedia.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer border-0 py-4 px-4" style="background: #111c3a; border-top: 1px solid #1e2d53 !important;">
                <div class="d-flex justify-content-center justify-content-md-end">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection