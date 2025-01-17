<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageName')</title> <!-- ntik iki di ganti -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loginRegisterPage.css') }}">
  </head>
  <body>
    <!-- login register gawe blade templating -->
    <div class="setToMidle"> <!-- bg image di set di sini -->
        <!-- ini untuk bg nya -->
        <video src="{{asset('image/loginRegisterPage/vidioBg.mp4')}}" class="bgVideo" autoplay muted loop>
            <!-- iki kosongan jk di isi apa apa !!! -->
        </video>

        <div class="addLayer">
          <!-- ini buat atasnya jok lupa di absolute -->
          <div class="borderCard">
            <div class="setJudul"> <!-- judul ntik buat logo lek ketemu -->
              <img src="image/global/AnimaxxLogoCloseUpNoBg.png" alt="" style="height: 60px;">
            </div>
            <div class="setIsian"> <!-- ini tempan isi data diri kayak username pass dll -->
              @yield('isian')

              <!-- pesan kusus -->
              @if (session('pesan'))
                <div style="color: red;">{{session('pesan')}}</div>
              @endif
              @if (session('kusus'))
                <div style="color: green;">{{session('kusus')}}</div>
              @endif
              
              <!-- pesan error -->
              @error('edNama')
                <div style="color: red;">{{$message}}</div>
              @enderror
              @error('edEmail')
                <div style="color: red;">{{$message}}</div>
              @enderror
              @error('edUsername')
                <div style="color: red;">{{$message}}</div>
              @enderror
              @error('edPassword')
                <div style="color: red;">{{$message}}</div>
              @enderror

            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>