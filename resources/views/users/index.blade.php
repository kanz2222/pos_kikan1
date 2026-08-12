@extends('layouts.app')

@section('title', 'Manajemen Users')

@section('content')

@include('layouts.navbar')

<style>
    /* Latar Belakang Gelap Mulus Sesuai Foto (Dark Teal ke Dark Purple) */
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

    /* Card & Search Box */
    .custom-card {
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 14px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        background: #0f172a;
        overflow: hidden;
        transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .custom-card:hover {
        transform: translateY(-2px);
        border-color: rgba(20, 184, 166, 0.4);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.5);
    }

    .search-box {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .search-box:focus-within {
        border-color: rgba(20, 184, 166, 0.5);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    }

    /* Table Custom Styling */
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
        background-color: rgba(255, 255, 255, 0.04) !important;
    }

    .table-custom td {
        padding: 1rem 1.25rem;
        border: none;
        background-color: transparent !important;
        color: #e2e8f0 !important;
    }

    /* Avatar, Badges & Buttons */
    .avatar-initial {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #0d9488 0%, #10b981 100%);
        color: white;
        font-weight: bold;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
    }

    .badge-role {
        background: rgba(13, 148, 136, 0.15);
        color: #2dd4bf;
        border: 1px solid rgba(13, 148, 136, 0.3);
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.8rem;
        display: inline-block;
    }

    .btn-create {
        background: #10b981;
        color: #ffffff;
        font-weight: 700;
        border-radius: 8px;
        border: none;
        padding: 0.75rem 1.5rem;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        transition: all 0.2s ease;
    }

    .btn-create:hover {
        background: #059669;
        color: #ffffff;
        transform: translateY(-1px);
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
        background-color: #d97706;
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
        background-color: #dc2626;
        color: #ffffff;
    }

    /* Pagination */
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
                <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: rgba(13, 148, 136, 0.15); color: #2dd4bf; border: 1px solid rgba(13, 148, 136, 0.3);">
                    <i class="bi bi-shield-lock-fill me-1"></i> Manajemen Pengguna POS
                </span>
                <h1 class="display-6 fw-bold mb-1 text-white">Halaman Akun</h1>
                <p class="text-muted mb-0" style="color: #94a3b8 !important;">Kelola daftar akun, admin, dan hak akses sistem POS</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('admin.users.create') }}" class="btn btn-create btn-lg shadow-sm px-4">
                    <i class="bi bi-person-plus-fill me-2"></i> Tambah Akun
                </a>
            </div>
        </div>

        <div class="card search-box p-3 mb-4">
            <form action="{{ route('admin.users') }}" method="GET">
                <div class="input-group">
                    <input 
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control border-0 py-2 px-3"
                        style="background-color: #0b1329 !important; color: #f8fafc;"
                        placeholder="Cari nama atau email akun..."
                    >
                    <button class="btn btn-primary px-4 fw-semibold" type="submit" style="background: #10b981; border: none;">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.users') }}" class="btn px-3 d-flex align-items-center" style="background: rgba(255, 255, 255, 0.08); color: #f8fafc; border: 1px solid rgba(255, 255, 255, 0.15);">
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
                            <th scope="col" class="py-3">Nama</th>
                            <th scope="col" class="py-3">Email</th>
                            <th scope="col" class="py-3">Role</th>
                            <th scope="col" class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td class="ps-4 fw-bold" style="color: #94a3b8;">{{ $users->firstItem() + $loop->index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-initial me-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="fw-bold text-white">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span style="color: #94a3b8;">{{ $user->email }}</span>
                            </td>
                            <td>
                                <span class="badge-role">
                                    {{ $user->role->name ?? 'No Role' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-edit-custom btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete-custom btn-sm" onclick="return confirm('Yakin hapus user ini?')">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5" style="color: #94a3b8;">
                                Tidak ada data pengguna ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-transparent border-0 py-4 px-4">
                <div class="d-flex justify-content-center justify-content-md-end">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection