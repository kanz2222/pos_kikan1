@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    body {
        /* Background netral & bernuansa modern dark slate */
        background: radial-gradient(circle at center, #1e293b 0%, #0f172a 100%);
        min-height: 100vh;
        margin: 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }

    /* Maskot & Speech Bubble */
    .welcomer-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: -28px;
        z-index: 10;
    }

    .speech-bubble {
        background: #0f172a; /* Warna disesuaikan dengan background dark slate */
        color: #ffffff;
        font-weight: 600;
        font-size: 0.825rem;
        padding: 0.4rem 0.95rem;
        border-radius: 20px;
        margin-bottom: 8px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        transition: all 0.3s ease;
    }

    .speech-bubble::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 5px 5px 0;
        border-style: solid;
        border-color: #0f172a transparent;
    }

    .speech-bubble.error-mode {
        background: #dc2626;
        border-color: #dc2626;
    }

    .speech-bubble.error-mode::after {
        border-color: #dc2626 transparent;
    }

    .avatar-wrapper {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #ffffff;
        padding: 3px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        animation: floatMascot 3s ease-in-out infinite alternate;
    }

    @keyframes floatMascot {
        from { transform: translateY(0); }
        to { transform: translateY(-5px); }
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .eye, .closed-eye { transition: opacity 0.2s ease; }
    .peeking .eye { opacity: 0; }
    .peeking .closed-eye { opacity: 1 !important; }

    .shake-error { animation: shake 0.4s ease-in-out; }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25%, 75% { transform: translateX(-6px); }
        50% { transform: translateX(6px); }
    }

    .jump-submit { animation: jump 0.4s ease-in-out; }
    @keyframes jump {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    /* Card Form */
    .login-card {
        width: 100%;
        max-width: 23rem;
        border: none;
        border-radius: 20px;
        background: #ffffff;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
        padding: 2.2rem 1.8rem 1.8rem;
    }

    .login-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: #0f172a; /* Hitam pekat tajam */
        letter-spacing: -0.02em;
    }

    .login-subtitle {
        font-size: 0.85rem;
        color: #475569; /* Abu gelap berteks jelas */
        font-weight: 500;
    }

    .form-label {
        font-weight: 700;
        color: #1e293b; /* Sangat kontras */
        font-size: 0.725rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Penyesuaian Kontras Input Field & Teks */
    .form-control {
        background-color: #f8fafc;
        border: 1.5px solid #cbd5e1; /* Border lebih tegas & jelas */
        border-radius: 10px;
        padding: 0.7rem 0.9rem;
        font-size: 0.9rem;
        color: #0f172a !important; /* Warna teks isi tajam */
        font-weight: 500;
        transition: all 0.2s;
    }

    .form-control::placeholder {
        color: #64748b; /* Placeholder lebih gelap agar gampang dibaca */
        opacity: 1;
    }

    .form-control:focus {
        background-color: #ffffff;
        border-color: #0f172a;
        box-shadow: 0 0 0 4px rgba(15, 23, 42, 0.15);
        outline: none;
    }

    /* Tombol Utama - Menggunakan Warna Background Slate */
    .btn-submit {
        background: #0f172a;
        border: none;
        border-radius: 10px;
        padding: 0.75rem;
        font-weight: 700;
        font-size: 0.925rem;
        color: #ffffff !important;
        letter-spacing: 0.02em;
        transition: all 0.2s;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.35);
    }

    .btn-submit:hover {
        background: #1e293b;
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.45);
        transform: translateY(-1px);
    }

    .badge-error {
        color: #dc2626;
        font-size: 0.775rem;
        font-weight: 600;
        margin-top: 0.3rem;
        display: block;
    }
</style>

<div class="login-wrapper">
    <div class="welcomer-container">
        <div class="speech-bubble" id="speechBubble">Halo! Silakan masuk ya</div>
        <div class="avatar-wrapper" id="avatarWrapper">
            <div class="avatar-img">
                <svg id="characterSvg" width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="10" r="6" fill="#0f172a"/>
                    <circle class="eye" cx="10" cy="9" r="0.8" fill="#ffffff"/>
                    <circle class="eye" cx="14" cy="9" r="0.8" fill="#ffffff"/>
                    <path class="closed-eye" d="M9 9.5C9.5 10 10.5 10 11 9.5" stroke="#ffffff" stroke-width="0.8" stroke-linecap="round" style="opacity:0;"/>
                    <path class="closed-eye" d="M13 9.5C13.5 10 14.5 10 15 9.5" stroke="#ffffff" stroke-width="0.8" stroke-linecap="round" style="opacity:0;"/>
                    <path id="mouth" d="M10 12C11 13 13 13 14 12" stroke="#ffffff" stroke-width="0.8" stroke-linecap="round"/>
                    <path d="M5 21C5 17.5 8 15 12 15C16 15 19 17.5 19 21" stroke="#0f172a" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="card login-card text-center">
        <h4 class="login-title mb-1">Selamat Datang</h4>
        <p class="login-subtitle mb-4">Masukkan akun Kamu untuk melanjutkan</p>

        <form id="loginForm" action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label mb-1">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                @error('email')
                    <span class="badge-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4 text-start">
                <label for="password" class="form-label mb-1">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
                @error('password')
                    <span class="badge-error"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-submit w-100">
                Masuk Ke Sistem
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const pwd = document.getElementById('password');
    const avatar = document.getElementById('avatarWrapper');
    const svg = document.getElementById('characterSvg');
    const bubble = document.getElementById('speechBubble');
    const form = document.getElementById('loginForm');

    pwd?.addEventListener('focus', () => { svg.classList.add('peeking'); bubble.innerText = "Gak ngintip kok!"; });
    pwd?.addEventListener('blur', () => { svg.classList.remove('peeking'); bubble.innerText = "Halo! Silakan masuk ya"; });

    @if ($errors->any())
        avatar?.classList.add('shake-error');
        bubble?.classList.add('error-mode');
        if (bubble) bubble.innerText = "Waduh, akun tidak ditemukan! ❌";
    @endif

    form?.addEventListener('submit', () => {
        avatar?.classList.add('jump-submit');
        bubble?.classList.remove('error-mode');
        if (bubble) bubble.innerText = "Yey, sebentar ya!";
    });
});
</script>

@endsection