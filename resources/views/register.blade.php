@extends('loginRegisterPage/layoutLoginRegister')

@section('pageName')
Register
@endsection

@section('isian')
<div>
    @if(session('pesan'))
        <div class="alert alert-danger">
            {{ session('pesan') }}
        </div>
    @endif

    <form action="{{ url('/register') }}" method="post">
        @csrf
        <input type="text" id="edEmail" class="setUkuran @error('edEmail') is-invalid @enderror" 
            placeholder="Email" name="edEmail" value="{{ old('edEmail') }}">
        @error('edEmail')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="text" id="edName" class="setUkuran @error('edNama') is-invalid @enderror" 
            placeholder="Your Name" name="edNama" value="{{ old('edNama') }}">
        @error('edNama')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="text" id="edUser" class="setUkuran @error('edUsername') is-invalid @enderror" 
            placeholder="username" name="edUsername" value="{{ old('edUsername') }}">
        @error('edUsername')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="password" id="edPass" class="setUkuran @error('edPassword') is-invalid @enderror" 
            placeholder="password" name="edPassword">
        @error('edPassword')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <input type="submit" id="edSubmit" class="setUkuran setTombol" value="Click To Register" name="edSubmitRegister">
    </form>
    <span style="color: white;">Have Account ? <a href="{{ url('/') }}"> Click To Log In </a></span>
</div>
@endsection 