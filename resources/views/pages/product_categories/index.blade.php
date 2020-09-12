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
                <th>Unit Usaha</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($data as $kategori)
              <tr>
                <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                <td>{!! $kategori->kategori_produk !!}</td>
                <td>{!! $kategori->business->nama_usaha !!}</td>
                <td>
                  <a class="btn btn-warning" style="margin-right: 10px;" href="{{url()->current().'/'.$kategori->id.'/edit'}}" role="button">Edit</a>
                  <a class="btn btn-danger" style="margin-right: 10px;" href="{{url()->current().'/'.$kategori->id.'/delete'}}" role="button">Delete</a>
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
            $("#kategori_produk").addClass("active");
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
