@extends('loginRegisterPage/layoutLoginRegister')

@section('pageName')
Login
@endsection

@section('isian')
<div>
    @if(session('pesan'))
        <div class="alert alert-danger">
            {{ session('pesan') }}
        </div>
    @endif

    @if(session('kusus'))
        <div class="alert alert-success">
            {{ session('kusus') }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="post">
        @csrf
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

        <input type="submit" id="edSubmit" class="setUkuran setTombol" value="Log In" name="edSubmitLogin">
    </form>
    <span style="color: white;">Have Not Account Yet ? <a href="{{ url('/register') }}"> Click To Register </a></span>
</div>
@endsection 