<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="setMainBg" style="background-image: url('{{session('imageURL')}}');">
        <!-- uatama -->
        <div class="uatama">
            <div class="setTengah">
                <div class="setImgProfil" style="background-image: url('{{session('imageURL')}}');border: 3px solid {{session('color')}};"> <!-- foto profil -->
                    <!-- set gambar di style atas !!! -->
                </div>
            </div>
            <div class="setTengah">
                <h3>{{session('username')}}</h3>
            </div>
        </div>

        <!-- full -->
        <div class="full">

            <h3>History</h3>
            <div class="history">
                @for ($i = 0; $i < 16; $i ++)

                    <!-- card history dimulai di sini (masih error scroll barnya) -->
                    <div class="cardHistory">
                        <div class="setHistoryImg" style="background-image: url('https://wallpaperaccess.com/full/9408932.png');"> <!-- Gambarnya -->
                            <!-- set gambar di style -->
                        </div> 
                        <div class="setHistoryTitle"> <!-- Judulnya -->
                            Naruto Episode 1
                        </div>
                    </div>

                @endfor
            </div>

            <h3>Ubah Info Akun</h3>
            <div class="ubahInfoAkun">
                <form action="/main/profile/ubah" method="post">
                    @csrf
                    <input type="text" class="fillInfo" name="edImage" placeholder="Image Url" value="{{session('imageURL')}}"> <br>
                    <input type="text" class="fillInfo" name="edNama" placeholder="Nama" value="{{session('nama')}}"> <br>
                    <input type="text" class="fillInfo" name="edEmail" placeholder="Email" value="{{session('email')}}"> <br>
                    <input type="text" class="fillInfo" name="edUsername" placeholder="Username" value="{{session('username')}}"> <br>
                    <input type="password" class="fillInfo" name="edPassword" placeholder="Password" value="{{session("password")}}"> <br>
                    <input type="submit" class="fillInfoButton" name="edSubmit">
                </form>
                @if (session('pesan'))
                    <div style="color: red;">{{session('pesan')}}</div>
                @endif
            </div>

            @yield('additionalButton')

            <!-- log out -->
            <h3>Log Out</h3>
            <a href="/" style="text-decoration: none;">
                <div class="setButtonLogOut">
                    Log Out
                </div>
            </a>
        
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>