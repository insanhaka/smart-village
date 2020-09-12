@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Edit akun user</p>
        <hr>
        <form method="POST" action="/admin/user/{!!$data->id!!}/update">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{!! $data->name !!}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{!! $data->email !!}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password (*)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Role (*)</label>
                            <select class="form-control" name="roles_id">
                                <option value="">Select role</option>
                                @foreach ($roles as $item)
                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <p style="color: red; font-size: 11px;">Kolom dengan tanda bintang wajib diinput ulang</p>
                    </div>
                </div>
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
            $("#user").addClass("active");
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
