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
            {{$dt['vidio']->judul}}
        </h2>
        <div style="color:white"> <!-- Tanggal Rilis -->
        @if(isset($dt['vidio']->relaseDate))
            @php
                // Mengubah format tanggal
                $date = new DateTime($dt['vidio']->relaseDate);
                $formattedDate = $date->format('d F Y');
            @endphp
            Dirilis Tanggal : {{ $formattedDate }}
        @else
            <span>Tanggal rilis tidak tersedia</span>
        @endif
        </div>
        <div style="color:white"> <!-- Tanggal Like And Bookmark -->
            <div class="f">

                <!-- Tunjukan Jumlah Like -->
                <div class="setLayoutTampilanLikeBookmark">

                @if($dt['likelist'] == null || $dt['likelist']->status == 0) <!-- belum like -->
                    <i class="bi bi-bookmark-heart setFont"></i> <!-- like belum -->
                @else 
                    <i class="bi bi-bookmark-heart-fill setFont"></i> <!-- like sudah -->
                @endif

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

            <!-- add komentar -->
            <div class="aselole">
                <div class="barAddUtama">
                    <div class="setInputText">
                        <input type="text" id="komentarnya" class="setInputTextPada" placeholder="Masukan Komentar">
                    </div>
                    <div class="addBtnSend">
                        <i class="bi bi-box-arrow-up" id="klikSend"></i>
                    </div>
                </div>
            </div>

            <!-- munculin semua komentar di sini -->
            @foreach ($dt['komen'] as $d)
            <div class="setCardComentar">
                <?php
                    $color = null;
                    if(session('member') == 0){
                        $color = 'white';
                    }
                    else if(session('member') == 1){
                        $color = 'purple';
                    }
                    else{
                        $color = 'gold';
                    }

                ?>
                <div class=setFotoProfilUser style="background-image: url('{{session('imageURL')}}');border: 3px solid <?= $color ?>;">
                    <!-- berisi foto profil user -->
                </div>
                <div class="setUserInfo">
                    <span class="setNamaUser">@ {{session('username')}}</span><br><!-- username user -->
                    <span>{{$d->isiKomentar}}</span>
                </div>
            </div>
            @endforeach

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

    <script>
        $('#klikSend').click(function (even) {
            var $komen = $('#komentarnya').val();
            var $idVid = '{{$dt['vidio']->id}}';
            
            $.ajax({
                //uts_se
                url: '/addkomen',
                type: 'GET',
                data:{
                    komen: $komen,
                    idvid: $idVid,
                },
                success:function(res){
                    alert('sukses');
                },
                error:function(){
                    alert('Gagal Add Komentar');
                }
            })
        })
    </script>
@endsection

@section('newrelase') <!-- tampilin semua episodenya -->
    <div class="scrollBar">

        <!-- untuk card ukuran kecil mulai dari sini -->
        
        @foreach ($dt['listVidio'] as $d)
        <div class="miniCard">
            <!-- jangan lupa ganti bgi nya -->
            <div class="setGambarCardMini" style="background-image: url('https://wallpaperaccess.com/full/9408932.png');">
                <!-- udah ada imagenya biarin kosong -->
            </div>
            <div class="setIdentitas"><!-- isi identitas anime di sini -->
                <span style="font-weight: bold;font-size: 18px;">{{$d->judul}}<br></span> <!-- Judul -->
                <span>{{$d->relaseDate}}</span> <!-- Relase Date -->
            </div>
        </div>
        @endforeach

    </div>
@endsection