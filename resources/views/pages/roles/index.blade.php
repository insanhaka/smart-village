@extends('layouts.app')

@section('content')
    <div class="content">
      <p>Role Akun</p>
      <hr>
      <div class="container">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
          <thead>
              <tr>
                <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                <th>Name</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($data as $roles)
              <tr>
                <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                <td>{!! $roles->name !!}</td>
                <td>
                  <a class="btn btn-warning" style="margin-right: 10px;" href="{{url()->current().'/'.$roles->id.'/edit'}}" role="button">Edit</a>
                  <a class="btn btn-danger" style="margin-right: 10px;" href="{{url()->current().'/'.$roles->id.'/delete'}}" role="button">Delete</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div style="float: right;">
                  <a class="btn btn-primary" href="{{url()->current().'/add'}}" role="button">Add Data</a>
                </div>
            </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function() {   
            $("#roles").addClass("active");
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
@endsection
