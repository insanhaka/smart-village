@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Data akun user</p>
        <hr>
        <div class="container">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                    <tr>
                        <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        @if ($user->peran == null)
                        <td>----</td>
                        @else
                        <td>{!! $user->peran->name !!}</td>
                        @endif
                        @if ($user->is_active == 1)
                        <td><input type="checkbox" id="{!!$user->id!!}" value="" class="lcs_check{!!$user->id!!}" checked="1" autocomplete="off" /></td>
                        @else
                        <td><input type="checkbox" id="{!!$user->id!!}" value="" class="lcs_check{!!$user->id!!}" autocomplete="off" /></td>
                        @endif
                        <td>
                            <a class="btn btn-warning" style="margin-right: 10px;" href="{{url()->current().'/'.$user->id.'/edit'}}" role="button">Edit</a>
                            <a class="btn btn-danger" style="margin-right: 10px;" href="{{url()->current().'/'.$user->id.'/delete'}}" role="button">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
        </div>
    </div>

    <script>
        $(document).ready(function() {   
            $("#user").addClass("active");
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

    <script type="text/javascript" src="{{ asset('assets/js/lc_switch.js') }}"></script>

    @foreach ($data as $user)
    <script>
        $(document).ready(function(){
            $('.lcs_check{!!$user->id!!}').lc_switch();
            // triggered each time a field changes status
            $('body').delegate('.lcs_check{!!$user->id!!}', 'lcs-statuschange', function(event) {
                var status = ($(this).is(':checked')) ? '1' : '0';
                var id = event.target.id;
                var is_active = status;
                console.log(id);
                console.log(status);
                axios.post('/admin/user/activation', {
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
    @endforeach
@endsection
