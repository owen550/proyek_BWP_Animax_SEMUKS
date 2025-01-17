@extends('loginRegisterPage/layoutLoginRegister')

@section('pageName')
Login
@endsection

@section('isian')
<div>
    //Saya adalah Christopher Octave Sinjaya yang rohnya telah tertukar
    <form action="/" method="post">
        @csrf
        <input type="text" id="edUser" class="setUkuran" placeholder="username" name="edUsername">
        <input type="password" id="edPass" class="setUkuran" placeholder="password" name="edPassword">
        <input type="submit" id="edSubmit" class="setUkuran setTombol" value="Log In" name="edSubmitLogin">
    </form>
    <span style="color: white;">Have Not Account Yet ? <a href="{{url('/register')}}"> Click To Register </a></span>
</div>
@endsection
