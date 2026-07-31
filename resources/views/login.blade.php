<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')

<!-- Custom Modern Vibrant Dark Palette with Black-Emerald Accents Theme Styling for Login -->
<style>
    body {
        background: linear-gradient(135deg, #064e3b 0%, #065f46 25%, #1e1b4b 60%, #0f172a 100%);
        background-attachment: fixed;
        min-height: 100vh;
        margin: 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }

    .login-card {
        width: 100%;
        max-width: 24rem;
        border: 1px solid rgba(52, 211, 153, 0.2);
        border-radius: 16px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.45), 0 0 30px rgba(16, 185, 129, 0.1);
        background: rgba(13, 19, 33, 0.92);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        animation: fadeInDown 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        overflow: hidden;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-header {
        background: #0b1329;
        color: #f8fafc;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 1.75rem 1.5rem 1.25rem 1.5rem;
        position: relative;
    }

    .login-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #10b981 0%, #6366f1 50%, #ec4899 100%);
    }

    .login-title {
        font-size: 1.25rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin: 0;
        text-transform: uppercase;
        color: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #cbd5e1;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .form-control {
        background-color: #131b2e;
        border: 1px solid #1e293b;
        border-radius: 10px;
        color: #f8fafc;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.2s ease-in-out;
    }

    .form-control:focus {
        background-color: #0b1329;
        border-color: #10b981;
        color: #ffffff;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        outline: none;
    }

    .form-control::placeholder {
        color: #64748b;
    }

    .btn-submit {
        background: linear-gradient(135deg, #065f46 0%, #0f172a 100%);
        border: 1px solid #10b981;
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #047857 0%, #064e3b 100%);
        border-color: #34d399;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.25);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .badge-error {
        background-color: rgba(239, 68, 68, 0.15);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 6px;
        padding: 0.4rem 0.6rem;
        font-size: 0.75rem;
        font-weight: 600;
        display: block;
    }
</style>

<div class="login-wrapper">
    <div class="card text-center login-card">
        <div class="login-header">
            <h4 class="login-title">
                <i class="bi bi-shield-lock-fill" style="color: #10b981;"></i> 
                Selamat Datang
            </h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" 
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama@email.com" required>
                    @error('email')
                        <div class="badge-error mt-2"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4 text-start">
                    <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" 
                    id="exampleInputPassword1" placeholder="••••••••" required>
                    @error('password')
                        <div class="badge-error mt-2"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-submit text-white w-100">
                    Masuk Ke Sistem
                </button>
            </form>
        </div>
    </div>
</div>

<!-- batas Akhir isi konten -->
@endsection