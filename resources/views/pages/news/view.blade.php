@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if ($berita->is_active == 1)
                    <input type="checkbox" id="{!!$berita->id!!}" value="" class="lcs_check{!!$berita->id!!}" checked="1" autocomplete="off" />
                    @else
                    <input type="checkbox" id="{!!$berita->id!!}" value="" class="lcs_check{!!$berita->id!!}" autocomplete="off" />
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="btn-group" role="group" aria-label="Basic example" style="float: right; margin-top: -3%;">
                        <a class="btn btn-warning" href="{{url('/admin/berita/'.$berita->id.'/edit')}}" role="button">Edit</a>
                        <a class="btn btn-danger" href="{{url('/admin/berita/'.$berita->id.'/delete')}}" role="button">Delete</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card" style="width: 100%;">
                    @if($berita->gambar == null)
                    <img src="{{asset('news_picture/default-image.png')}}" class="card-img-top" alt="Card image cap">
                    @else
                    <img src="{{asset('news_picture/'.$berita->gambar)}}" class="card-img-top" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">{!! $berita->judul !!}</h5>
                        <p class="card-text">{!! $berita->isi !!}</p>
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

    <script type="text/javascript" src="{{ asset('assets/js/lc_switch.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.lcs_check{!!$berita->id!!}').lc_switch();
            // triggered each time a field changes status
            $('body').delegate('.lcs_check{!!$berita->id!!}', 'lcs-statuschange', function(event) {
                var status = ($(this).is(':checked')) ? '1' : '0';
                var id = event.target.id;
                var is_active = status;
                console.log(id);
                console.log(status);
                axios.post('/admin/berita/activation', {
                    is_active: is_active,
                    id: id
                })
                  .then(function (response) {
                      console.log(response);
                      iziToast.success({
                            title: 'Success',
                            message: 'Proses berhasil',
                            position: 'topRight'
                        });
                })
                  .catch(function (error) {
                      console.log(error);
                      iziToast.warning({
                            title: 'Upps !',
                            message: 'Proses Gagal',
                            position: 'topRight'
                        });
                });
            });
        });
    </script>
@endsection
