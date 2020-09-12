@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Edit Data Kategori Produk</p>
        <hr>
        <form method="POST" action="/admin/kategori_produk/{!!$data->id!!}/update">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Unit Usaha</label>
                            <select class="form-control" name="business_id">
                                @foreach ($item as $usaha)
                                    @if ($data->business_id == $usaha->id)
                                        <option value="{!! $usaha->id !!}" selected>{!! $usaha->nama_usaha !!}</option>
                                    @else
                                        <option value="{!! $usaha->id !!}">{!! $usaha->nama_usaha !!}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori Produk</label>
                            <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" value="{!! $data->kategori_produk !!}">
                        </div>
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
