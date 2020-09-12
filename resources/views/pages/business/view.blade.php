@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
           <h3>{!! $data->nama_usaha !!}</h3>
           <hr>
           <div style="float: right; margin-top: -9px;">
                <a class="btn btn-primary" href="{{url('admin/produk/add')}}" role="button">Tambah Produk</a>
           </div>
           <ul class="nav nav-tabs" id="myTab" role="tablist">
               @foreach ($kategori as $item)
                <li class="nav-item">
                <a @if($item->id == $min) class="nav-link {!!'active'!!}" @else class="nav-link" @endif id="home-tab" data-toggle="tab" href="#data{!!$item->id!!}" role="tab" aria-controls="home" aria-selected="true">{!!$item->kategori_produk!!}</a>
                </li>
               @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach ($kategori as $item)
                <div  @if($item->id == $min) class="tab-pane fade show {!!'active'!!}" @else class="tab-pane fade show" @endif id="data{!!$item->id!!}" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container" style="margin-top: 50px;">
                        <div class="row">
                            @foreach ($produk as $value)
                            @if($value->product_categories_id == $item->id)
                            <div class="col-md-3">
                                <div class="card element-item" style="width: 100%; max-height: 95%; padding: 2%; background-color: #f5f6fa;">
                                    <img src="{{asset('news_picture/default-image.png')}}" class="card-img-top" height="130" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text text-right created_at"><small class="text-muted">{!! $value->created_at !!}</small></p>
                                        <h6 class="card-title judul" style="font-weight: bold;">{!! $value->nama !!}</h6>
                                        <p class="card-text">{!! $value->deskripsi !!}</p>
                                        <a class="btn btn-primary" href="#" role="button">Lihat Berita</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {   
            $("#usaha").addClass("active");
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

    
@endsection
