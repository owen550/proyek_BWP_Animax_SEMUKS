<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageName')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/mainMenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/album.css')}}">
</head>
  <body>
    <!-- untuk gambar bgi ganti sesuai yang dibuka -->
    <div class="setLayarUtama" style="background-image: url('{{$dt['album']->imageAlbum}}');">
        <div class="addLayertransisi"></div>
        <div class="addSecondaryLayer">
          <div class="navBar">
            <img src="{{asset('/image/global/AnimaxxLogoCloseUpNoBg.png')}}" alt="" style="width: 150;height: 70px;">
          </div>
          <div style="width: 100%;display:flex;">
            <div class="infoAnime">
              <div class="infoDetail">
                <span style="color: white;"><h1>{{$dt['album']->judulUtama}}</h1></span> <br> <!-- Judul -->
                <span style="color: white;">{{$dt['album']->deskripsi}}</span> <br><br> <!-- Deskripsi -->
                <span style="color: white">Genre : 
                  
                  @foreach($dt['album']->genres as $genre)
                      <span>{{ $genre->genreName }}</span>
                      @if (!$loop->last) <!-- ksik koma lek ws terakhir -->
                          , 
                      @endif
                  @endforeach

                </span> <br><br> <!-- Genre -->
                <div class="setTombolWatch"> <!-- tombol lihat trailer sama lihat vidio langsung -->
                  @if ($dt['vidio'] == null)
                    <span style="font-size: 25px; color:red;font-weight: bold;">Admin Belum Menambahkan Vidio, Cek Lagi Nanti !!!</span>
                  @else
                    <a href="/watch/{{$dt['vidio']->judul}}" class="setButton setColor1">Watch Trailer</a>
                    <a href="/watch/{{$dt['vidio']->judul}}" class="setButton setColor2">Watch Anime</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="infoKosong">
              
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>