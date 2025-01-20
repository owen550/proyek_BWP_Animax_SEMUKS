@extends('mainMenu/layoutMainMenu')

<!-- catatan, setiap ganti misal home pegi halaman x, ojok lupa ndek section menu di kasik text decoration underline -->
<!-- isine juga berubah mengikuti db ntik  -->

<!-- bagian menu di atasnya -->
@section('menu')
    <span id="filter" class="setMenuTambahan setUngu">Home</span>
    <span id="filter" class="setMenuTambahan">PlayList</span>
    <span id="filter" class="setMenuTambahan">Movies</span>
    <span id="filter" class="setMenuTambahan">News</span>
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

                <a href="{{url('album')}}">
                    <div class="watchAlbum">
                        <i class="bi bi-collection-play"></i>
                        <span style="margin-left: 20px;">Watch Album </span>
                    </div>
                </a>
            
            </div>
        </div>
        <!--  -->
    </div>

    <!-- Bagian Ini Tampilin Semua -->
    <br>
    <br>
    <h2>Popular Anime</h2>
    <div class="listAnime">
        
        @foreach ($dt['album'] as $d)
        <!-- isi tiap card (oi mas adidas ini check poin ya dull) -->
        <div class="card">
            <div class="setGambar"> <!-- Isi Gambarnya Di Sini Ntik Ganti Sesuai DB-->
                <img src="{{$d->imageHorizontal}}" alt="" class="setUkuranGambar">
            </div>
            <div> <!-- Isi Judul Anime Di Sini --->
                <span style="color: yellow;font-weight: bold; font-size: 25px;">{{$d->judulUtama}}<br></span> <!-- Judul -->
                <span style="color: mediumblue;font-weight: bold; font-size: 16px;">Genre : 

                @foreach ($dt['album'] as $album)  <!-- Looping melalui album -->
                    @if ($album->judulUtama == $d->judulUtama) <!-- bagian ini masih error -->
                        @foreach ($album->genres as $genre)  <!-- Looping melalui genre terkait -->
                            <span>{{ $genre->genreName }}</span> <!-- Menampilkan nama genre -->
                            @if (!$loop->last) <!-- Jika bukan genre terakhir -->
                                ,
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <br></span> <!-- Genre -->
                <span style="color: white;">Like : 
                    @foreach ($dt['listlike'] as $l)
                    @if ($l->judulUtama == $d->judulUtama)
                        {{$l->like_total}}
                    @endif
                    @endforeach
                </span> <!-- Like (ini gini aja ngitung like = max(jumlah like anime di judul tersebut))-->
            </div> 
        </div>
        @endforeach

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
    
    <!-- ajax dll -------------------------------------------------------------------------------------------- -->
    <script>
        // akan ada 2 hal yang dilakukan, 1 lakukan ajax ubah navbar, lakukan reload data dan show ulang
        $('#filter').click(function (even) {
            // sek error betulis bsk
        });
        // buat token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken  // Menambahkan token CSRF ke header setiap request AJAX
            }
        }); 
    </script>
@endsection