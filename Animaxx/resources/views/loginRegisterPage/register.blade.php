@extends('loginRegisterPage/layoutLoginRegister')

@section('pageName')
Register
@endsection

@section('isian')
<form action="/register" method="post">
    @csrf
    <input type="text" id="edEmail" class="setUkuran" placeholder="Email" name="edEmail">
    <input type="text" id="edName" class="setUkuran" placeholder="Your Name" name="edNama">
    <input type="text" id="edUser" class="setUkuran" placeholder="username" name="edUsername">
    <input type="password" id="edPass" class="setUkuran" placeholder="password" name="edPassword">
    <input type="submit" id="edSubmit" class="setUkuran setTombol" value="Click To Register" name="edSubmitRegister">
</form>
<span style="color: white;">Have Account ? <a href="{{url('/')}}"> Click To Log In </a></span>
@endsection