@extends('mainMenu/layoutMainMenu')

<!-- catatan, setiap ganti misal home pegi halaman x, ojok lupa ndek section menu di kasik text decoration underline -->
<!-- isine juga berubah mengikuti db ntik  -->

<!-- bagian menu di atasnya -->
@section('menu')
<a href="" class="setMenuTambahan" style="text-decoration: underline;color: purple;">Home</a>
<a href="" class="setMenuTambahan">PlayList</a>
<a href="" class="setMenuTambahan">Movies</a>
<a href="" class="setMenuTambahan">News</a>
@endsection

<!-- bagian list vidionya -->
@section('allcontent')
    <h2>Most Like</h2>
    <!-- ini bagian top anime di sort berdasarkan like -->
    <!-- untuk bagian ini berdasarkan databes y, ini mek sementara polae db ne belum ada -->
    <div style="background-image: url('https://wallpaperaccess.com/full/9408932.png');" class="setUkuranPanel" >
        <!--  -->
        <div class="setTopAnime">
            <div style="width: 60%;height:100%;"><!-- semenyata sini kosong dulu ---></div>
            <div class="transisi"><!-- ini bagian info animenya --->
                
                <h2>Naruto Abdul All Hamzah Zainudin All In Boom Boom Boom</h2> <!-- ini buat judul utama -->
                <h5>The Journy Of Paradise</h5> <!-- Judul Tambahannya -->
                <span>Our Most Recomended Anime <br></span>
                <span>Genre : (iki ntik di foreach genrene) <br></span>
                <span>Status : Nti disi status <br></span>
                <span>Relase Date : (dd MM YYYY) <br> </span>
                <span>Studio : Misal Mapa</span> <br><br>
                <div class="watchAlbum">
                    <i class="bi bi-collection-play"></i>
                    <span style="margin-left: 20px;">Watch Album </span>
                </div>
            </div>
        </div>
        <!--  -->
    </div>

    <!-- Bagian Ini Tampilin Semua -->
    <br>
    <br>
    <h2>Popular Anime</h2>
    <div class="listAnime">
            
        <!-- isi tiap card (oi mas adidas ini check poin ya dull) -->
        <div class="card">
            <div class="setGambar"> <!-- Isi Gambarnya Di Sini Ntik Ganti Sesuai DB-->
                <img src="https://wallpaperaccess.com/full/9408941.jpg" alt="" class="setUkuranGambar">
            </div>
            <div> <!-- Isi Judul Anime Di Sini --->
                <span style="color: yellow;font-weight: bold; font-size: 25px;">Ambil dari db <br></span> <!-- Judul -->
                <span style="color: mediumblue;font-weight: bold; font-size: 16px;">Genre : (ambil dari tabel) <br></span> <!-- Genre -->
                <span style="color: white;">Like : (ambil dari db)</span> <!-- Like (ini gini aja ngitung like = max(jumlah like anime di judul tersebut))-->
            </div> 
        </div>

    </div>  
@endsection

@section('newrelase')
    <h2>Last Relase</h2>
    <!-- untuk card ukuran kecil mulai dari sini -->
    <div class="miniCard">
        <!-- jangan lupa ganti bgi nya -->
        <div class="setGambarCardMini" style="background-image: url('https://wallpaperaccess.com/full/9408932.png');">
            <!-- nanti gambar cardnya ditaruh sini -->
        </div>
        <div class="setIdentitas"><!-- isi identitas anime di sini -->
            <span style="font-weight: bold;font-size: 18px;">Alibaba The Last Air Harem <br></span> <!-- Judul -->
            <span>(Misal Action,Romance,Dan Lain Lain) <br></span> <!-- Genre -->
            <span>17 Agussedih 1945</span> <!-- Relase Date -->
        </div>
    </div>
    
@endsection