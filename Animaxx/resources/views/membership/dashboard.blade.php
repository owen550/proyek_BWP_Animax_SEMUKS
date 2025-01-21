@extends('layouts.app')

@section('content')
    <h1>Selamat datang, {{ $user->name }}</h1>
    <p>Status Member: {{ $user->member == 1 ? 'Berlangganan' : ($user->member == 2 ? 'Admin' : 'Belum Berlangganan') }}</p>
    @if ($user->member == 0)
        <a href="{{ route('subscription.page') }}" class="btn btn-primary">Langganan Sekarang</a>
    @endif
@endsection
