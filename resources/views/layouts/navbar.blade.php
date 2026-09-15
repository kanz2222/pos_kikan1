<!-- Navbar POS Core -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
  <div class="container px-3">
    <!-- Mengarahkan brand ke halaman profil toko (Sudah Diperbaiki) -->
    <a class="navbar-brand" href="{{ route('profil') }}">
        <i class="bi bi-terminal-fill text-white"></i> Kanzz Store
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Menu Utama di Sebelah Kiri -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-3 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
            <i class="bi bi-grid-1x2-fill"></i> Halaman Utama
          </a>
        </li>
        @if(auth()->check() && strtolower(auth()->user()->role->name) === 'admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users') }}">
            <i class="bi bi-people-fill"></i> Akun
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk*') ? 'active' : '' }}" href="{{ route('produk.index') }}">
            <i class="bi bi-box-seam-fill"></i> Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}" href="{{ route('penjualan.index') }}">
            <i class="bi bi-cart-check-fill"></i> Penjualan
          </a>
        </li>
        <!-- Menu About -->
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="{{ route('about') }}">
            <i class="bi bi-info-circle-fill"></i> Tentang Saya
          </a>
        </li>
      </ul>

      <!-- Tombol Logout di Sebelah Kanan -->
      <div class="d-flex mt-3 mt-lg-0">
        <form action="{{ route('logout') }}" method="POST" class="m-0">
          @csrf
          <button type="submit" class="btn btn-logout">
            <i class="bi bi-box-arrow-right"></i> Keluar
          </button>
        </form>
      </div>

    </div>
  </div>
</nav>

<!-- Custom Modern Vibrant Dark Palette with Black-Emerald Accents Theme Styling for Navbar -->
<style>
    /* Modern Solid Dark Navbar Styling - High Contrast */
    .navbar-custom {
        background: #0f172a !important;
        border-bottom: 2px solid #10b981;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        padding-top: 10px;
        padding-bottom: 10px;
        position: relative;
    }

    .navbar-custom::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        opacity: 1;
    }

    .navbar-custom .navbar-brand {
        color: #ffffff !important;
        font-weight: 800;
        letter-spacing: 0.75px;
        font-size: 1.25rem;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .navbar-custom .navbar-brand i {
        color: #34d399 !important;
    }

    .navbar-custom .navbar-nav .nav-link {
        color: #ffffff !important;
        transition: all 0.2s ease-in-out;
        border-radius: 8px;
        padding: 8px 16px;
        margin: 0 3px;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        opacity: 0.85;
    }

    .navbar-custom .navbar-nav .nav-link:hover {
        color: #ffffff !important;
        background-color: rgba(16, 185, 129, 0.25);
        opacity: 1;
    }

    .navbar-custom .navbar-nav .nav-link.active {
        color: #ffffff !important;
        background-color: #059669 !important;
        border: 1px solid #34d399;
        box-shadow: 0 0 12px rgba(52, 211, 153, 0.4);
        opacity: 1;
    }

    .navbar-custom .navbar-toggler {
        border: 1px solid #34d399;
        border-radius: 8px;
        padding: 6px 12px;
        background-color: #064e3b;
    }

    .navbar-custom .navbar-toggler:focus {
        box-shadow: 0 0 0 2px #34d399;
    }

    .navbar-custom .navbar-toggler-icon {
        filter: brightness(0) invert(1);
    }

    .navbar-custom .btn-logout {
        background-color: #dc2626;
        color: #ffffff !important;
        font-weight: 700;
        border-radius: 8px;
        padding: 8px 18px;
        transition: all 0.2s ease-in-out;
        border: 1px solid #f87171;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.4);
    }

    .navbar-custom .btn-logout:hover {
        background-color: #b91c1c;
        color: #ffffff !important;
        border-color: #ef4444;
        box-shadow: 0 4px 14px rgba(220, 38, 38, 0.6);
        transform: translateY(-1px);
    }

    .navbar-custom .btn-logout:active {
        transform: translateY(0);
    }
</style>