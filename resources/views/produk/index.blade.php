@extends('layouts.app')

@section('title', 'Manajemen Produk')

@section('content')

@include('layouts.navbar')

<style>
    /* Latar Belakang Gelap Mulus Sesuai Halaman User */
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

    /* Efek Pendar Cahaya Lembut */
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

    /* Hero Banner Utama */
    .hero-banner {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        color: #f8fafc;
        padding: 2.5rem;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    /* Garis Aksen Gradien Halus di Atas Card */
    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #f97316, #10b981, #06b6d4, #8b5cf6);
    }

    .badge-hero {
        background: rgba(13, 148, 136, 0.15) !important;
        color: #2dd4bf !important;
        border: 1px solid rgba(13, 148, 136, 0.3);
    }

    /* Card Box & Search Box */
    .custom-card, .search-box {
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 14px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        background: #0f172a;
        overflow: hidden;
        transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .search-box:focus-within {
        border-color: rgba(20, 184, 166, 0.5);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }

    /* Product Grid Card Style */
    .product-grid-card {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 14px;
        transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }

    .product-grid-card:hover {
        transform: translateY(-2px);
        border-color: rgba(20, 184, 166, 0.4);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.5);
    }

    .product-card-img-wrapper {
        position: relative;
        width: 100%;
        height: 180px;
        overflow: hidden;
        background: #0b1329;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .product-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-grid-card:hover .product-card-img {
        transform: scale(1.05);
    }

    /* Badges Style */
    .badge-stock {
        background: rgba(13, 148, 136, 0.2);
        color: #2dd4bf;
        border: 1px solid rgba(13, 148, 136, 0.4);
        padding: 5px 10px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.75rem;
    }

    /* Buttons Style */
    .btn-create-product {
        background: #10b981;
        color: #ffffff;
        font-weight: 700;
        border-radius: 8px;
        border: none;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.2s ease;
    }

    .btn-create-product:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-detail-custom {
        background: rgba(6, 182, 212, 0.15);
        border: 1px solid rgba(6, 182, 212, 0.3);
        color: #22d3ee;
        font-weight: 700;
        border-radius: 6px;
        padding: 5px 12px;
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
        font-weight: 700;
        border-radius: 6px;
        padding: 5px 12px;
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
        font-weight: 700;
        border-radius: 6px;
        padding: 5px 12px;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .btn-delete-custom:hover {
        background: #dc2626;
        color: #ffffff;
    }

    /* Custom Modal Popup Overlay */
    .custom-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .custom-modal-overlay.active {
        display: flex;
    }

    .custom-modal-box {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
        color: #f8fafc;
        max-width: 420px;
        width: 90%;
        padding: 2rem;
        text-align: center;
    }

    .modal-icon-wrapper {
        width: 60px;
        height: 60px;
        background: rgba(239, 68, 68, 0.15);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #f87171;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        margin: 0 auto 1rem auto;
    }

    /* Pagination Styling */
    .pagination .page-link {
        background-color: #0b1329 !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: #94a3b8 !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #10b981 !important;
        border-color: #10b981 !important;
        color: #ffffff !important;
    }
</style>

<div class="page-wrapper">
    <div class="container">
        
        <div class="hero-banner p-4 p-md-5 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <span class="badge badge-hero px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm">
                    <i class="bi bi-box-seam-fill me-1"></i> Manajemen Inventaris POS
                </span>
                <h1 class="display-6 fw-bold mb-1 text-white">Puma Only</h1>
                <p class="mb-0" style="color: #94a3b8 !important;">Kelola daftar item, harga beli, harga jual, stok, dan inventaris sistem POS</p>
            </div>
            <div class="mt-3 mt-md-0">
                @can('create', App\Models\Produk::class)
                <a href="{{ route('produk.create') }}" class="btn btn-create-product btn-lg shadow-sm px-4">
                    <i class="bi bi-plus-circle-fill me-2"></i> Tambah Produk
                </a>
                @endcan
            </div>
        </div>

        {{-- ALERT NOTIFIKASI ERROR GAGAL HAPUS --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 mb-4 shadow-sm" role="alert" style="background-color: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.4) !important; color: #fca5a5;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Gagal!</strong> {{ session('error') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card search-box p-3 mb-4">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group">
                    <input 
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control border-0 py-2 px-3"
                        style="background-color: #0b1329 !important; color: #f8fafc;"
                        placeholder="Cari nama produk..."
                    >
                    <button class="btn px-4 fw-semibold" type="submit" style="background: #10b981; color: #ffffff; border: none;">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('produk.index') }}" class="btn px-3 d-flex align-items-center" style="background: rgba(255, 255, 255, 0.08); color: #f8fafc; border: 1px solid rgba(255, 255, 255, 0.15);">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- GRID CARD VIEW SECTION --}}
        <div class="row g-4 mb-4">
            @forelse ($products as $product)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="product-grid-card">
                    <div class="product-card-img-wrapper">
                        <img src="{{ asset('storage/'.$product->foto) }}" class="product-card-img" alt="{{ $product->nama }}">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge badge-stock shadow-sm">{{ $product->stok }} pcs</span>
                        </div>
                    </div>
                    
                    <div class="p-3 d-flex flex-column flex-grow-1">
                        <div class="mb-2">
                            <span class="small" style="color: #38bdf8;">
                                <i class="bi bi-person-circle me-1"></i> {{ $product->user->name }}
                            </span>
                        </div>
                        
                        <h5 class="fw-bold text-white text-truncate mb-3" title="{{ $product->nama }}">{{ $product->nama }}</h5>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3 mt-auto">
                            <div>
                                <span class="d-block text-muted small" style="font-size: 0.7rem; text-transform: uppercase;">Harga Beli</span>
                                <span class="fw-semibold small" style="color: #94a3b8;">Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</span>
                            </div>
                            <div class="text-end">
                                <span class="d-block text-muted small" style="font-size: 0.7rem; text-transform: uppercase;">Harga Jual</span>
                                <span class="fw-bold text-success">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2 pt-2 border-top border-secondary border-opacity-10">
                            <a href="{{ route('produk.show', $product) }}" class="btn btn-detail-custom btn-sm flex-fill text-center">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            
                            @can('update', $product)
                            <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit-custom btn-sm flex-fill text-center">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            @endcan
                            
                            @can('delete', $product)
                            <button type="button" 
                                    class="btn btn-delete-custom btn-sm flex-fill text-center" 
                                    onclick="openDeleteModal('{{ $product->id }}', '{{ addslashes($product->nama) }}')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card custom-card text-center py-5">
                    <div class="fs-5" style="color: #94a3b8;">Data produk tidak tersedia.</div>
                </div>
            </div>
            @endforelse
        </div>

        {{-- PAGINATION CONTAINER --}}
        <div class="card custom-card">
            <div class="card-footer border-0 py-4 px-4" style="background: transparent;">
                <div class="d-flex justify-content-center justify-content-md-end">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Custom Popup Modal -->
<div id="customDeleteModal" class="custom-modal-overlay">
    <div class="custom-modal-box">
        <div class="modal-icon-wrapper">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h4 class="fw-bold text-white mb-2">Hapus Produk?</h4>
        <p class="mb-4" style="color: #94a3b8;">
            Apakah Anda yakin ingin menghapus <strong id="deleteProductName" class="text-white"></strong>? Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="d-flex gap-2 justify-content-center">
            <button type="button" class="btn px-4 fw-semibold" onclick="closeDeleteModal()" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); color: #f8fafc;">
                Batal
            </button>
            <form id="deleteForm" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-4 fw-semibold" style="background: #dc2626; border: none;">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(productId, productName) {
        document.getElementById('deleteProductName').innerText = productName;
        document.getElementById('deleteForm').action = "{{ url('produk') }}/" + productId;
        document.getElementById('customDeleteModal').classList.add('active');
    }

    function closeDeleteModal() {
        document.getElementById('customDeleteModal').classList.remove('active');
    }
</script>

@endsection