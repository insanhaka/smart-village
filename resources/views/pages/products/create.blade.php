@extends('layouts.app')

@section('content')
    <div class="content">
        <p>Tambah Data Produk</p>
        <hr>
        <form method="POST" action="/admin/produk/create">
            {{ csrf_field() }}
            <div class="container" style="margin-top: -10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Harga</label>
                      <input type='currency' class="form-control" placeholder='ketik tanpa tanda koma/titik' />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Stok</label>
                      <input type="text" class="form-control" id="inputPassword4" placeholder="Stok">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword4">Upload Foto Produk</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile03">
                              <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Unit Usaha</label>
                        <select class="form-control" id="business_id" name="business_id">
                            <option value="">Pilih Unit Usaha</option>
                            @foreach ($data as $usaha)
                            <option value="{!! $usaha->id !!}">{!! $usaha->nama_usaha !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Kategori Produk</label>
                        <select class="form-control" id="product_categories_id" name="product_categories_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $jenis)
                            <option value="{!! $jenis->id !!}">{!! $jenis->kategori_produk !!}</option>
                            @endforeach
                        </select>
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

    <script>
        var currencyInput = document.querySelector('input[type="currency"]')
        var currency = 'IDR' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

        // format inital value
        onBlur({target:currencyInput})

        // bind event listeners
        currencyInput.addEventListener('focus', onFocus)
        currencyInput.addEventListener('blur', onBlur)


        function localStringToNumber( s ){
        return Number(String(s).replace(/[^0-9.-]+/g,""))
        }

        function onFocus(e){
        var value = e.target.value;
        e.target.value = value ? localStringToNumber(value) : ''
        }

        function onBlur(e){
        var value = e.target.value

        var options = {
            maximumFractionDigits : 2,
            currency              : currency,
            style                 : "currency",
            currencyDisplay       : "symbol"
        }
        
        e.target.value = value 
            ? localStringToNumber(value).toLocaleString(undefined, options)
            : ''
        }
    </script>

    <script>
        $(document).ready(function(){

            var APP_URL_ADMIN = {!! json_encode(url(\Request::route()->getPrefix())) !!};

            $.comboAjax('#business_id','#product_categories_id', APP_URL_ADMIN+'/getcategori');

        });
    </script>
    
@endsection
