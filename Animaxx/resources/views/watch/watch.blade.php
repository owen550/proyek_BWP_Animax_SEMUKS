@extends('mainMenu/layoutMainMenu')

@section('pageName')
    Watch
@endsection

@section('menu')
    <!-- ini kosong kalau di watch -->
@endsection

@section('allcontent') <!-- tampilin layar utama sama komentar -->

    <div class="scrollBar">
        <!-- Vidonya -->
        <video src="{{asset('image/loginRegisterPage/vidioBg.mp4')}}" preload="auto" class="setLayarVidio" controls>
            Error !! Silahkan Refresh
        </video>
        <h2 class="setJudul"> <!-- Judul Vidio -->
            Abdul All Bin Abdul Hamzah Episode 2 
        </h2>
        <div style="color:white"> <!-- Tanggal Rilis -->
            17 Agussedih 1945
        </div>
        <div style="color:white"> <!-- Tanggal Like And Bookmark -->
            <div class="f">

                <!-- Tunjukan Jumlah Like -->
                <div class="setLayoutTampilanLikeBookmark">
                    <i class="bi bi-bookmark-heart setFont"></i> <!-- like belum -->
                    <i class="bi bi-bookmark-heart-fill setFont"></i> <!-- like sudah -->
                    <span class="setFont giveSpace">30</span> <!-- Jumlah Like Ntik Di Sini -->
                </div>
                <!-- Tunjukan Udah Bookmark Atau Belum -->
                <div class="setLayoutTampilanLikeBookmark">
                    <i class="bi bi-bookmarks setFont"></i> <!-- bookmark belum -->
                    <i class="bi bi-bookmarks-fill setFont"></i> <!-- bookmark sudah -->
                </div>
            </div>
        </div>

        <!-- komentar -->
        <div class="setKomentar">
            <h2>Komentar</h2>

            <!-- munculin semua komentar di sini -->
            <div class="setCardComentar">
                <div class=setFotoProfilUser style="background-image: url('https://tse2.mm.bing.net/th?id=OIP.SXJrDXx1NmFi6MHrFfVYlQHaHa&pid=Api&P=0&h=180');border: 3px solid white;">
                    <!-- berisi foto profil user -->
                </div>
                <div class="setUserInfo">
                    <span class="setNamaUser">@Agung Setiabudi</span><br><!-- username user -->
                    <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit esse voluptate inventore officiis deleniti iste accusantium fugiat temporibus minima modi natus veritatis quibusdam ducimus quos, autem nobis id deserunt explicabo!</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('newrelase') <!-- tampilin semua episodenya -->
    <div class="scrollBar">

        <!-- untuk card ukuran kecil mulai dari sini -->
        <div class="miniCard">
            <!-- jangan lupa ganti bgi nya -->
            <div class="setGambarCardMini" style="background-image: url('https://wallpaperaccess.com/full/9408932.png');">
                <!-- udah ada imagenya biarin kosong -->
            </div>
            <div class="setIdentitas"><!-- isi identitas anime di sini -->
                <span style="font-weight: bold;font-size: 18px;">Alibaba The Last Air Harem <br></span> <!-- Judul -->
                <span>17 Agussedih 1945</span> <!-- Relase Date -->
            </div>
        </div>

    </div>
@endsection