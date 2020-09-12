@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Tambah Data Unit Usaha</p>
        <hr>
        <form method="POST" action="/admin/usaha/create">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Unit Usaha</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Business Name">
                            <input type="text" class="form-control" id="is_active" name="is_active" value="1" style="visibility: hidden;">
                        </div>
                    </div>
                </div>
                {{-- <div class="row" style="margin-top: -30px;">
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <label for="exampleFormControlInput1">Jenis Produk</label>
                            <div class="input-group" style="margin-top: -10px;">
                                <input type="text" name="ketegori_produk[]" class="form-control" placeholder="Product Categories" autocomplete="off" style="height: 40px; margin-top: 8px;">
                                <div class="input-group-append">                
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Tambah jenis Produk</button>
                    </div>
                </div> --}}
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
            $("#usaha").addClass("active");
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

    {{-- <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group" style="margin-top: -10px;">';
            html += '<input type="text" name="ketegori_produk[]" class="form-control" placeholder="Product Categories" autocomplete="off" style="height: 40px; margin-top: 8px;">';
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
    </script> --}}
    
@endsection
