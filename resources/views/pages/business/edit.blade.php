@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Edit data unit usaha</p>
        <hr>
        <form method="POST" action="/admin/usaha/{!!$data->id!!}/update">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Usaha</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Business Name" value="{!! $data->nama_usaha !!}">
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
@endsection
