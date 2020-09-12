@extends('layouts.app')

@section('content')
    <div class="content">
      <h3>Halaman Dashboard</h3>
    </div>

    <script>
      $(document).ready(function() {   
          $("#dashboard").addClass("active");
      });
    </script>
@endsection
