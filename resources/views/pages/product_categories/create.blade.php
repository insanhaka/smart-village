@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Tambah Data Kategori Produk</p>
        <hr>
        <form method="POST" action="/admin/kategori_produk/create">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Unit Usaha</label>
                            <select class="form-control" name="business_id">
                                <option value="">Pilih Unit Usaha</option>
                                @foreach ($data as $usaha)
                                <option value="{!! $usaha->id !!}">{!! $usaha->nama_usaha !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <label for="exampleFormControlInput1">Jenis Produk</label>
                            <div class="input-group" style="margin-top: -10px;">
                                <input type="text" name="kategori_produk[]" class="form-control" placeholder="Product Categories" autocomplete="off" style="height: 40px; margin-top: 8px;">
                                <div class="input-group-append">                
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Tambah jenis Produk</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="float: right;">
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {   
            $("#kategori_produk").addClass("active");
        });
    </script>

    <script type="text/javascript">
        @if ($message = Session::get('warning'))
            iziToast.warning({
                        title: 'Success',
                        message: 'Data Gagal Disimpan',
                        position: 'topRight'
                    });
        @endif
    </script>

    <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group" style="margin-top: -10px;">';
            html += '<input type="text" name="kategori_produk[]" class="form-control" placeholder="Product Categories" autocomplete="off" style="height: 40px; margin-top: 8px;">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
    
@endsection
