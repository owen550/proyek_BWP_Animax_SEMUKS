<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageName')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/mainMenu.css')}}"> <!-- buat Main Menu -->
    <link rel="stylesheet" href="{{asset('css/global.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/watchPage.css')}}"> <!-- buat watch page -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- buat ajax jquery -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Ajax csrf token -->
</head>
  <body>
    <div class="baseColor">
        <div class="navBar">
            <div class="setLogo">
                <!-- tes satu dua tiga -->
                <img src="{{asset('image/global/AnimaxxLogoCloseUp.png')}}" alt="" style="width: 100%; height: 70px;">
            </div>
            <div class="setMenu"> <!-- Home PlayList Movies News -->
                @yield('menu') 
            </div>
            <div> <!-- Buat Kayak Search Bar Pakek Bootstrap icon -->
                <div class="searchBarTemplate">
                    <div class="searchBar">
                        <input type="text" id="edSearch" class="setInputSearchBar" placeholder="Search Title">
                        <i class="bi bi-search" style="color: white;font-size: 20px;"></i>
                    </div>
                </div>
            </div>

            <?php
                $member = session('member');
                Session::put('memberStatus','user');
                if($member < 2){
                    $target = "user";
                    if($member == 0){
                        Session::put('color','white');
                    }
                    else{
                        Session::put('color','purple');
                    }
                }
                else{
                    Session::put('memberStatus','admin');
                    Session::put('color','yellow');
                }
                // echo "<div style='color: white;'>$target</div>";
            ?>
            
            <a href="{{url('main/profile/' . session('memberStatus'))}}" style="text-decoration: none;">
                <div class="setFotoProfil"> <!-- buat div lingkaran gambar foto provil (ntik lek diteken isa keluar setting) -->
                    <img src={{session('imageURL')}} alt="" class="setGambar" style="border: {{session('color')}} 4px solid;">
                    <!-- gambar pp nanti diganti sama foto profil di db !!! -->
                </div>
            </a>

        </div>
    
        <div class="isi">
            <div class="container f">
                <div class="setBorder allvid">
                    @yield('allcontent') <!-- munculnya sembarangan tak perlu di order -->
                </div>
                <div class="setBorder newrelase">
                    @yield('newrelase') <!-- order by tanggal rilis desc -->
                </div>
            </div>
        </div>

        <div class="footer"> <!-- iki buat footer (gk perlu blade templating kudune)-->
            Kelompok Animax : Owen Moses(223117101),Ricard Tirto(),Kevin AK() -> (isi jok lupa !!!)
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>