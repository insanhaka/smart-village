<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Products;
use App\Business;
use App\Product_Categories;

class ProductsController extends Controller
{
    public function index($id)
    {
        $usaha = Business::findOrFail($id);
        $jenis = Product_Categories::where('business_id', $id)->get();
        $product = Products::where('business_id', $id)->get();
        $min = Product_Categories::where('business_id', $id)->min('id');

        // dd($produk);

        return view('pages.products.index', ['data' => $usaha, 'kategori' => $jenis, 'produk' => $product, 'min' => $min]);
    }

    public function add()
    {
        $usaha = Business::all();
        $jenis = Product_Categories::all();

        return view('pages.products.create', ['data' => $usaha, 'kategori' => $jenis]);
    }

    public function create(Request $request)
    {
        $harga = Str::before($request->harga, '.00');
        $duit = preg_replace('/[^0-9]/', '', $harga);

        // menyimpan data file yang diupload ke variabel
        $foto = $request->file('foto');
        $nama_file = time()."_".$foto->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'product_pictures';
        $foto->move($tujuan_upload,$nama_file);

        Products::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $duit,
            'stok' => $request->stok,
            'foto' => $nama_file,
            'product_categories_id' => $request->product_categories_id,
            'business_id' => $request->business_id,
        ]);

        return redirect(url('/admin/usaha'))->with('success','Data Berhasil Disimpan');
    }
}
