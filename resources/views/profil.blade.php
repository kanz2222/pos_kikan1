<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Toko - KANZZ STORE</title>
    
    <!-- Bootstrap CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #0b1120;
            color: #ffffff;
            font-family: system-ui, -apple-system, sans-serif;
        }

        /* Navbar Custom Styling */
        .navbar-custom {
            background: #0f172a !important;
            border-bottom: 2px solid #10b981;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            padding-top: 10px;
            padding-bottom: 10px;
            position: relative;
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

        /* Card Custom Styling ala Dashboard */
        .card-custom {
            background: linear-gradient(145deg, #0f172a, #1e293b);
            border: 1px solid rgba(52, 211, 153, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
        }

        .hero-banner {
            background: linear-gradient(135deg, #0f172a 0%, #064e3b 100%);
            border-top: 3px solid #34d399 !important;
        }

        .info-item {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #1e293b;
            border-radius: 10px;
            padding: 12px 16px;
            transition: all 0.2s;
        }

        .info-item:hover {
            border-color: #34d399;
            background: rgba(15, 23, 42, 0.9);
        }
    </style>
</head>
<body>

    <!-- Navbar POS Core -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
      <div class="container px-3">
        <a class="navbar-brand" href="{{ route('profil') }}">
            <i class="bi bi-terminal-fill text-white"></i> Kanzz Store
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <li class="nav-item">
              <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="{{ route('about') }}">
                <i class="bi bi-info-circle-fill"></i> Tentang Saya
              </a>
            </li>
          </ul>

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

    <!-- Konten Utama Profil Toko -->
    <div class="container py-5">
        <!-- Banner Hero Toko -->
        <div class="card card-custom hero-banner p-5 mb-4 text-center">
            <div class="py-2">
                <span class="badge bg-success bg-opacity-25 text-success border border-success mb-3 px-3 py-2 rounded-pill fw-bold">
                    <i class="bi bi-shop me-1"></i> RESMI & TERVERIFIKASI
                </span>
                <h1 class="fw-bold text-white mb-2 display-5" style="letter-spacing: 1px;">KANZZ STORE</h1>
                <p class="text-white opacity-75 fs-5 mb-0">Sistem Kasir & Manajemen Penjualan Terpercaya</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Kolom Tentang Kami -->
            <div class="col-lg-7">
                <div class="card card-custom h-100 p-4 p-md-5">
                    <h4 class="fw-bold mb-3 text-white d-flex align-items-center gap-2">
                        <i class="bi bi-file-text-fill text-success"></i> Tentang Kami
                    </h4>
                    <p class="text-white opacity-85 fs-6" style="line-height: 1.8;">
                        <strong class="text-white">KANZZ STORE</strong> adalah platform yang menyediakan solusi transaksi dan manajemen stok barang secara modern, efisien, dan transparan. Kami berkomitmen memberikan layanan terbaik dengan pencatatan penjualan yang akurat dan real-time.
                    </p>
                    
                    <h5 class="fw-bold mt-4 mb-3 text-white">Keunggulan KANZZ STORE</h5>
                    <ul class="list-unstyled text-white d-flex flex-column gap-2">
                        <li class="d-flex align-items-center gap-3 info-item">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i> 
                            <span class="text-white opacity-9kn">Transaksi Cepat & Pembayaran Non-Tunai / Tunai</span>
                        </li>
                        <li class="d-flex align-items-center gap-3 info-item">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i> 
                            <span class="text-white opacity-90">Laporan Penjualan Harian Real-time</span>
                        </li>
                        <li class="d-flex align-items-center gap-3 info-item">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i> 
                            <span class="text-white opacity-90">Pemantauan Stok Menipis & Stok Habis Otomatis</span>
                        </li>
                        <li class="d-flex align-items-center gap-3 info-item">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i> 
                            <span class="text-white opacity-90">Keamanan Data Transaksi Terjamin</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kolom Informasi Toko -->
            <div class="col-lg-5">
                <div class="card card-custom h-100 p-4 p-md-5">
                    <h4 class="fw-bold mb-4 text-white d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle-fill text-info"></i> Informasi Toko
                    </h4>
                    
                    <div class="d-flex flex-column gap-3">
                        <div class="info-item">
                            <span class="text-info d-block small text-uppercase tracking-wider fw-bold mb-1">Nama Toko</span>
                            <span class="fw-bold text-white fs-6">KANZZ STORE</span>
                        </div>

                        <div class="info-item d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-info d-block small text-uppercase tracking-wider fw-bold mb-1">Status Operasional</span>
                                <span class="text-white small">Jam Kerja Aktif</span>
                            </div>
                            <span class="badge bg-success px-3 py-2 fw-bold">Aktif / Buka</span>
                        </div>

                        <div class="info-item">
                            <span class="text-info d-block small text-uppercase tracking-wider fw-bold mb-1">Metode Pembayaran</span>
                            <span class="text-white fw-medium">Tunai, QRIS, Transfer Bank</span>
                        </div>

                        <div class="info-item">
                            <span class="text-info d-block small text-uppercase tracking-wider fw-bold mb-1">Alamat</span>
                            <span class="text-white">Jl. Raya Utama No. 123, Indonesia</span>
                        </div>

                        <div class="info-item">
                            <span class="text-info d-block small text-uppercase tracking-wider fw-bold mb-1">Kontak / WhatsApp</span>
                            <span class="text-success fw-bold font-monospace">+62 812-3456-7890</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>