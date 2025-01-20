@extends('profile/layout')

@section('additionalButton')
<h3>Upload Anime</h3>
<!-- upload anime baru -->
<a href="" style="text-decoration: none;">
    <div class="setButtonUmum">
        Upload Anime Baru
    </div>
</a>

<a href="{{ route('upload.album') }}" style="text-decoration: none;">
    <div class="setButtonUmum">
        Upload Album Baru
    </div>
</a>

<!-- lihat info user -->
 <h3>Info User</h3>
<a href="" style="text-decoration: none;">
    <div class="setButtonUmum">
        Lihat User
    </div>
</a>

@endsection