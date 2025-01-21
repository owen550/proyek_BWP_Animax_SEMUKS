@extends('layouts.app')

@section('content')
    <h1>Pilih Paket Langganan</h1>
    <form action="{{ route('subscribe') }}" method="POST">
        @csrf
        <label for="package">Paket:</label>
        <select name="package" id="package" required>
            <option value="1 bulan">1 Bulan - Rp 50,000</option>
            <option value="6 bulan">6 Bulan - Rp 250,000</option>
            <option value="12 bulan">12 Bulan - Rp 500,000</option>
        </select>
        <button type="submit" class="btn btn-success">Langganan</button>
    </form>
@endsection
