@extends('profile/layout')

@section('additionalButton')
<div class="container">
    <h1>Detail Users</h1>

    <!-- CSS Inline untuk pengguliran -->
    <style>
        .table-container {
            max-height: 400px; /* Sesuaikan dengan kebutuhan */
            overflow-y: auto; /* Tambahkan scroll vertikal jika konten melampaui tinggi */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>

@php
    $user = Auth::user(); // Mendapatkan data user yang sedang login
@endphp

@if ($user)  <!-- Pengecekan jika user tidak null -->
    <h1>Selamat datang, {{ $user->username }}</h1>

    <p>Status Member: <span id="status-member">
        {{ $user->member == 1 ? 'Berlangganan' : ($user->member == 2 ? 'Admin' : 'Belum Berlangganan') }}
    </span></p>

    @if ($user->member == 0)
        <!-- Tombol Langganan Sekarang hanya muncul jika member = 0 -->
        <a href="{{ route('showSubscriptionPage') }}" class="btn btn-primary">Langganan Sekarang</a>
    @endif
@else
    <p>Silakan login terlebih dahulu untuk mengakses halaman ini.</p>
@endif

</div>
@endsection
