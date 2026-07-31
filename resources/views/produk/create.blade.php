    @extends('layouts.app')

    @section('title', 'Tambah Produk')

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

        .hero-banner-form {
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

        .hero-banner-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #10b981 0%, #6366f1 50%, #ec4899 100%);
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

        /* Form Controls Dark Theme Overrides */
        .form-control, .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(52, 211, 153, 0.2);
            background-color: #0b1329 !important;
            color: #f8fafc !important;
            transition: all 0.2s ease;
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .form-control:focus, .form-select:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
            background-color: #0b1329 !important;
            color: #ffffff !important;
        }

        .form-label {
            font-weight: 700;
            color: #cbd5e1;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        /* Custom Buttons */
        .btn-submit-custom {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            color: white;
            font-weight: 700;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            transition: all 0.2s ease-in-out;
        }

        .btn-submit-custom:hover {
            background: linear-gradient(135deg, #047857 0%, #059669 100%);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
        }

        .btn-back-custom {
            background: rgba(148, 163, 184, 0.15);
            border: 1px solid rgba(148, 163, 184, 0.3);
            color: #cbd5e1;
            font-weight: 700;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            transition: all 0.2s ease-in-out;
        }

        .btn-back-custom:hover {
            background-color: rgba(148, 163, 184, 0.3);
            color: #ffffff;
            border-color: rgba(148, 163, 184, 0.5);
        }

        .btn-header-back {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #f8fafc;
            transition: all 0.2s ease;
        }

        .btn-header-back:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.4);
        }
    </style>

    <div class="page-wrapper">
        <div class="container">
            
            <div class="hero-banner-form p-4 p-md-5 mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <span class="badge px-3 py-1 rounded-pill fw-bold mb-2 shadow-sm" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3);">
                        <i class="bi bi-box-seam-fill me-1"></i> Manajemen Produk
                    </span>
                    <h1 class="display-6 fw-bold mb-1 text-white">Tambah Produk Baru</h1>
                    <p class="text-muted-custom mb-0" style="color: #94a3b8;">Silakan lengkapi formulir di bawah ini untuk menambahkan produk ke inventaris.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('produk.index') }}" class="btn btn-header-back rounded-pill px-4 fw-bold shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card custom-card p-4 p-md-5">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            @include('produk._form')

                            <div class="d-flex justify-content-end gap-3 mt-4 pt-3" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                                <a href="{{ route('produk.index') }}" class="btn btn-back-custom">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-submit-custom">
                                    <i class="bi bi-check-circle-fill me-1"></i> Simpan Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection