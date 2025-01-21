@extends('mainMenu/layoutMainMenu')

<!-- catatan, setiap ganti misal home pegi halaman x, ojok lupa ndek section menu di kasik text decoration underline -->
<!-- isine juga berubah mengikuti db ntik  -->

<!-- bagian menu di atasnya -->
@section('menu')
    <span id="Home" class="setMenuTambahan setUngu">Home</span>
    <span id="Playlist" class="setMenuTambahan">PlayList</span>
    <span id="Movies" class="setMenuTambahan">Movies</span>
    <span id="News" class="setMenuTambahan">News</span>
@endsection

<!-- bagian list vidionya -->
@section('allcontent')
    <h2>Most Like</h2>
    <!-- ini bagian top anime di sort berdasarkan like -->
    <!-- untuk bagian ini berdasarkan databes y, ini mek sementara polae db ne belum ada -->
    <div style="background-image: url('{{$dt['pop']['image']}}');" class="setUkuranPanel scrollBar" >
        <!--  -->
        <div class="setTopAnime">
            <div style="width: 60%;height:100%;"><!-- semenyata sini kosong dulu ---></div>
            <div class="transisi"><!-- ini bagian info animenya --->
                
                <h2>{{$dt['pop']['judulUtama']}}</h2> <!-- ini buat judul utama -->
                <h5>{{$dt['pop']['judulTambahan']}}</h5> <!-- Judul Tambahannya -->
                <span>Our Most Recomended Anime <br></span>
                <span>Genre : 
                    <!--  -->
                    @foreach ($dt['album'] as $album)  <!-- Looping melalui album -->
                        @if ($album->judulUtama == $dt['pop']['judulUtama']) <!-- Memeriksa judul album -->
                            @foreach ($album->genres as $genre)  <!-- Looping melalui genre terkait -->
                                <span>{{ $genre->genreName }}</span> <!-- Menampilkan nama genre -->
                                @if (!$loop->last) <!-- Jika bukan genre terakhir -->
                                    ,
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <!--  -->
                <br></span>
                <span>
                    Status : 
                    @if ($dt['pop']['Status'] == "Tamat")
                        <span style="color: green;">{{$dt['pop']['Status']}}</span>
                    @else
                        <span style="color: red;">{{$dt['pop']['Status']}}</span>
                    @endif
                <br></span>
                <span>Relase Date : {{$dt['pop']['relaseDate']}} <br> </span>
                <span>Studio : {{$dt['pop']['Studio']}}</span> <br><br>

                <a href="{{ url('/album/' . $dt['pop']['judulUtama']) }}" style="text-decoration: none;">
                    <div class="watchAlbum">
                        <i class="bi bi-collection-play"></i>
                        <span style="margin-left: 20px;">Watch Album</span>
                    </div>
                </a>
            
            </div>
        </div>
        <!--  -->
    </div>

    <!-- Bagian Ini Tampilin Semua -->
    <br>
    <br>
    <h2 id="title">Home</h2>
    <div class="listAnime" id="listAnime">

        @foreach ($dt['album'] as $d)
        <!-- isi tiap card (oi mas adidas ini check poin ya dull) -->
        <a href="/album/{{$d->judulUtama}}" style="text-decoration: none;">
            <!-- ======================================== -->
            <div class="card">
                <div class="setGambar"> <!-- Isi Gambarnya Di Sini Ntik Ganti Sesuai DB-->
                    <img src="{{$d->imageHorizontal}}" alt="" class="setUkuranGambar">
                </div>
                <div> <!-- Isi Judul Anime Di Sini --->
                    <span style="color: yellow;font-weight: bold; font-size: 25px;">{{$d->judulUtama}}<br></span> <!-- Judul -->
                    <span style="color: mediumblue; font-weight: bold; font-size: 16px;">Genre: 
                    @foreach ($dt['album'] as $album)  <!-- Looping melalui album -->
                        @if ($album->judulUtama == $d->judulUtama) <!-- Memeriksa judul album -->
                            @foreach ($album->genres as $genre)  <!-- Looping melalui genre terkait -->
                                <span>{{ $genre->genreName }}</span> <!-- Menampilkan nama genre -->
                                @if (!$loop->last) <!-- Jika bukan genre terakhir -->
                                    ,
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <!-- cek poin -->
                </span>

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
            <!-- ======================================== -->
        </a>
        @endforeach

    </div>  
@endsection

@section('newrelase')
    <h2>Last Relase</h2>
    <!-- untuk card ukuran kecil mulai dari sini -->
    <div class="scrollBar setUkuranScroll">
        @foreach ($dt['vidio'] as $d)

        <a href="/watch/{ali}'" style="text-decoration: none; color: white;">
            <div class="miniCard">
                <!-- jangan lupa ganti bgi nya -->
                <div class="setGambarCardMini" style="background-image: url('{{$d->imageAlbum}}');">
                    <!-- nanti gambar cardnya ditaruh sini -->
                </div>
                <div class="setIdentitas"><!-- isi identitas anime di sini -->
                    <span style="font-weight: bold;font-size: 18px;">{{$d->judul}}<br></span> <!-- Judul -->
                    <span>(Misal Action,Romance,Dan Lain Lain) <br></span> <!-- Genre -->
                    <span>{{$d->relaseDate}}</span> <!-- Relase Date -->
                </div>
            </div>
        </a>

        @endforeach        
    
    <!-- ajax dll -------------------------------------------------------------------------------------------- -->
    <script>
        // akan ada 2 hal yang dilakukan, 1 lakukan ajax ubah navbar, lakukan reload data dan show ulang
        $('.setMenuTambahan').click(function (event){
            event.preventDefault();
            var $filter = $(this).text();

            $.ajax({
                url: '/main/home/filter',
                type: 'GET',
                data:{
                    filter: $filter
                },
                success: function(res) {
                    // Ubah warna navigasi
                    $('.setMenuTambahan').each(function () {
                        if ($(this).text() == $filter) {
                            $(this).removeClass('setUngu');
                        } else {
                            $(this).addClass('setUngu');
                        }
                    });

                    
                    $('#title').text(res.dt['judul']);
                    $('#listAnime').empty(); // Reset ulang view utama
                    var tabelBaru = '';

                    if($filter == 'Home') {
                        // Looping melalui album
                        $(res.dt['album']).each(function(index, con) {
                            tabelBaru +=
                                '<a href="/album/' + con.judulUtama + '" style="text-decoration: none;">' + 
                                    '<div class="card">' +
                                        '<div class="setGambar">' +
                                            '<img src="' + con.imageHorizontal + '" alt="" class="setUkuranGambar">' +
                                        '</div>' +
                                        '<div>' +
                                            '<span style="color: yellow; font-weight: bold; font-size: 25px;">' + con.judulUtama + '<br></span>' +
                                            '<span style="color: mediumblue; font-weight: bold; font-size: 16px;">Genre: ';

                            // Menambahkan genre
                            var genres = con.genres.map(function(genre) {
                                return genre.genreName;
                            }).join(', ');

                            tabelBaru += genres + '</span><br>';

                            // Menambahkan like
                            var likeCount = res.dt['listlike'].find(function(l) {
                                return l.judulUtama === con.judulUtama;
                            });

                            tabelBaru += '<span style="color: white;">Like: ' + (likeCount ? likeCount.like_total : 0) + '</span>' +
                                        '</div>' +
                                    '</div>' +
                                '</a>'; // Tutup link
                        });
                    }
                    else if($filter == 'PlayList'){
                        // Looping melalui playlist
                        $(res.dt['playlist']).each(function(index, con) {
                            tabelBaru += 
                                '<a href="/playlist/' + con.judul + '" style="text-decoration: none; width: 100%; color: white;">' + // Link ke playlist
                                    '<div class="setIsiBesar">' +
                                        '<div class="foto" style="background-image: url(\'' + con.imageAlbum + '\');">' + 
                                            '<!-- set foto di sini -->' +
                                        '</div>' +
                                        '<div class="info">' +
                                            '<div>' +
                                                '<h3>' + con.judul + '</h3>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</a>';
                        });
                    }
                    else if($filter == Movies){

                    }
                    else if($filter == News){

                    }
                    else{

                    }

                    // Menambahkan card baru ke kontainer
                    $('#listAnime').append(tabelBaru);
                },
                error:function() {
                    alert('Error');
                }
            })
        });
    </script>
@endsection