@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Tambah data role</p>
        <hr>
        <form method="POST" action="/admin/roles/create">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Role Name">
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-top: 2%;">
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {   
            $("#roles").addClass("active");
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
