@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Tambah Berita</p>
        <hr>
        <div class="container" style="margin-bottom: 3%;">
            <form method="POST" action="/admin/berita/create" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInput">Judul Berita</label>
                    <input type="text" class="form-control" id="judulberita" name="judul">
                    <input type="text" class="form-control" id="is_active" value="1" name="is_active" style="display: none;">
                </div>
                <div class="form-group">
                    <label for="exampleInput">Upload Gambar Berita</label>
                    <div class="tower-file">
                    <input type="file" name="gambar" id="demoInput5" />
                    <label for="demoInput5" class="btn btn-primary">
                        <span class="mdi mdi-upload"></span>Select Files
                    </label>
                    <button type="button" class="tower-file-clear btn btn-secondary align-top">
                        Clear
                    </button>
                </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Tulis Isi Berita</label>
                    <textarea class="form-control" name="isi" id="editor1" rows="3" style="resize: vertical; max-height: 100%;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="float: right;">Publish</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {   
            $("#berita").addClass("active");
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

    <script>
        $(document).ready(function() {
            $("#berita").addClass("active");
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        });
    </script>
@endsection
