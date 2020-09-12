@extends('layouts.app')

@section('content')
    <div class="content">
      <p>Unit Usaha</p>
      <hr>
      <div class="container">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
          <thead>
              <tr>
                <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                <th>Name</th>
                <th>Status</th>
                <th>Produk</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($data as $usaha)
              <tr>
                <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                <td>{!! $usaha->nama_usaha !!}</td>
                @if ($usaha->is_active == 1)
                <td><input type="checkbox" id="{!!$usaha->id!!}" value="" class="lcs_check{!!$usaha->id!!}" checked="1" autocomplete="off" /></td>
                @else
                <td><input type="checkbox" id="{!!$usaha->id!!}" value="" class="lcs_check{!!$usaha->id!!}" autocomplete="off" /></td>
                @endif
                <td>
                  <a class="btn btn-info" style="margin-right: 10px;" href="{{url('/admin/'.$usaha->id.'/produk')}}" role="button">Lihat</a>
                </td>
                <td>
                  <a class="btn btn-warning" style="margin-right: 10px;" href="{{url()->current().'/'.$usaha->id.'/edit'}}" role="button">Edit</a>
                  <a class="btn btn-danger" style="margin-right: 10px;" href="{{url()->current().'/'.$usaha->id.'/delete'}}" role="button">Delete</a>
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

    @foreach ($data as $bisnis)
    <script>
        $(document).ready(function(){
            $('.lcs_check{!!$bisnis->id!!}').lc_switch();
            // triggered each time a field changes status
            $('body').delegate('.lcs_check{!!$bisnis->id!!}', 'lcs-statuschange', function(event) {
                var status = ($(this).is(':checked')) ? '1' : '0';
                var id = event.target.id;
                var is_active = status;
                console.log(id);
                console.log(status);
                axios.post('/admin/usaha/activation', {
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
