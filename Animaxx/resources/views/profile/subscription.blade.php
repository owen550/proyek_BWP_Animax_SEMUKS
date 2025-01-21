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

 <!-- Form Langganan -->
 <form action="{{ route('subscribe') }}" method="POST">
        @csrf
        <label for="package">Pilih Paket:</label>
        <select name="package" id="package" required>
            <option value="1 bulan">1 Bulan - Rp 50,000</option>
            <option value="6 bulan">6 Bulan - Rp 250,000</option>
            <option value="12 bulan">12 Bulan - Rp 500,000</option>
        </select>
        <button type="submit" class="btn btn-success">Langganan</button>
    </form>

    <!-- Pesan konfirmasi -->
    @if(session('status'))
        <div style="color: green; margin-top: 20px;">{{ session('status') }}</div>
    @endif
    @if(session('error'))
        <div style="color: red; margin-top: 20px;">{{ session('error') }}</div>
    @endif
</div>
@endsection
