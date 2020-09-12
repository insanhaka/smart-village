@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Aspirasi Warga</p>
        <hr>
        <div class="container">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                      <th style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></th>
                      <th>Nama Pengirim</th>
                      <th>Isi</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $aspirasi)
                    <tr>
                      <td style="text-align: center;"><input type="checkbox" aria-label="Checkbox for following text input"></td>
                      <td>{!!$aspirasi->nama!!}</td>
                      <td>{!! Str::words($aspirasi->isi, 25, ' ...') !!}</td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".aspirasi{!!$aspirasi->id!!}" style="width: 150px;">Lihat Aspirasi</button>
                        <a class="btn btn-danger" style="margin-right: 10px; width: 150px;" href="{{url()->current().'/'.$aspirasi->id.'/delete'}}" role="button">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div style="float: right;">
                    {{-- <a class="btn btn-primary" href="{{url()->current().'/add'}}" role="button">Add Data</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    @foreach ($data as $aspir)
    <div class="modal fade aspirasi{!!$aspir->id!!}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Aspirasi Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="{{asset('aspirations_picture/'.$aspir->img_aspirasi)}}" class="card-img-top" alt="Card image cap">
                <hr>
                <h6>Nama : {!!$aspir->nama!!}</h6>
                <p>{!!$aspir->isi!!}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        $(document).ready(function() {   
            $("#aspirasi").addClass("active");
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
