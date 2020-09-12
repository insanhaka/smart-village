@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-10">
                <h5>Berita</h5>
            </div>
            <div class="col-md-1">
                <div style="margin-top: -15px;">
                    <a class="btn btn-danger" href="{{url()->current().'/add'}}" role="button">Tambah Berita</a>
                </div>
            </div>
        </div>
      
      <hr>
      <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" style="text-decoration: none; font-weight: bold; color: #57606f;">
                        Sort By
                    </a>
                    <div class="dropdown-menu drop-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item is-checked" type="button" data-sort-value="created_at">Tanggal Dipublish</button>
                        <button class="dropdown-item" type="button" data-sort-value="is_active">Status</button>
                        <button class="dropdown-item" type="button" data-sort-value="judul">Judul</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <form>
                    <div class="input-group no-border">
                      <input type="text" class="form-control" id="mySearch" placeholder="Search..." onkeyup="search()">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="nc-icon nc-zoom-split"></i>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="grid"> --}}
        <div class="row" style="margin-top: 3%;" id="myItems">
            @foreach ($data as $berita)
            <div class="col-md-3">
                <div class="card element-item" style="width: 100%; max-height: 95%; padding: 2%; background-color: #f5f6fa;">
                    @if($berita->gambar == null)
                    <img src="{{asset('news_picture/default-image.png')}}" class="card-img-top" height="130" alt="Card image cap">
                    @else
                    <img src="{{asset('news_picture/'.$berita->gambar)}}" class="card-img-top" height="130" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <p class="card-text text-right created_at"><small class="text-muted">{!! $berita->created_at !!}</small></p>
                        <h6 class="card-title judul" style="font-weight: bold;">{!! Str::limit($berita->judul, 30, ' ...') !!}</h6>
                        <p class="card-text">{!! Str::words($berita->isi, 10, ' ...') !!}</p>
                        <a class="btn btn-primary" href="{{url()->current().'/'.$berita->id.'/view'}}" role="button">Lihat Berita</a>
                        @if ($berita->is_active == 1)
                        <p class="card-text text-right"><small class="text-muted is_active">Status : AKTIF</small></p>
                        @else
                        <p class="card-text text-right"><small class="text-muted is_active">Status : TIDAK AKTIF</small></p>                      
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- </div> --}}
        <div class="row" style="margin-top: 3%;">
            <div class="col-md-12">
                <div style="float: right;">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function() {   
            $("#berita").addClass("active");
        });
    </script>
    
    <script type="text/javascript">
        @if ($message = Session::get('success'))
                iziToast.success({
                            title: 'Success',
                            message: 'Data Berhasil Disimpan',
                            position: 'topRight'
                        });
        @endif
    </script>
    <script type="text/javascript">
        @if ($message = Session::get('delok'))
                iziToast.success({
                            title: 'Success',
                            message: 'Data Berhasil Dihapus',
                            position: 'topRight'
                        });
        @endif
    </script>

    <script>
            function search() {
                var input, filter, cards, cardContainer, h5, title, i;
                input = document.getElementById("mySearch");
                filter = input.value.toUpperCase();
                cardContainer = document.getElementById("myItems");
                cards = cardContainer.getElementsByClassName("card");
                for (i = 0; i < cards.length; i++) {
                    title = cards[i].querySelector(".card-body h6.card-title");
                    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                        cards[i].style.display = "";
                    } else {
                        cards[i].style.display = "none";
                    }
                }
            }
    </script>




    {{-- Sorting JS --}}
    {{-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            percentPosition: true,
            itemSelector: '.grid-item',
            masonry: {
                columnWidth: '.grid-sizer { width: 100%; }'
            },
            getSortData: {
                created_at: '.created_at parseInt',
                is_active: '.is_active',
                judul: '.judul',
            }
        });

        // bind sort button click
        $('.drop-menu').on( 'click', 'button', function() {
            var sortValue = $(this).attr('data-sort-value');
            $grid.isotope({ sortBy: sortValue });
        });

        // change is-checked class on buttons
        $('.dropdown-menu').each( function( i, dropdownMenu ) {
            var $dropdownMenu = $( dropdownMenu );
            $dropdownMenu.on( 'click', 'button', function() {
                $dropdownMenu.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });
    </script> --}}
@endsection
