<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_Categories;
use App\Business;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        $jenis = Product_Categories::all();
        return view('pages.product_categories.index', ['data' => $jenis]);
    }

    public function add()
    {
        $usaha = Business::all();
        return view('pages.product_categories.create', ['data' => $usaha]);
    }

    public function create(Request $request)
    {
        foreach($request->kategori_produk as $kategori)
        {
            Product_Categories::create([
                'kategori_produk' => $kategori,
                'business_id' => $request->business_id
            ]);
        }
        return redirect(url('/admin/kategori_produk'))->with('success','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $usaha = Business::all();
        $jenis = Product_Categories::findOrFail($id);
        return view('pages.product_categories.edit', ['data' => $jenis, 'item' => $usaha]);
    }

    public function update(Request $request, $id)
    {
        $jenis = Product_Categories::findOrFail($id);
        $jenis->kategori_produk = $request->kategori_produk;
        $jenis->business_id = $request->business_id;
        $process = $jenis->save();

        if ($process) {
            return redirect(url('/admin/kategori_produk'))->with('success','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function delete($id)
    {
        $jenis = Product_Categories::find($id);
        $process = $jenis->delete();

        if ($process) {
            return redirect(url('/admin/kategori_produk'))->with('delok','Data Berhasil Dihapus');
        } else {
            return back()->with('delfal','Data Gagal Dihapus');
        }
    }
}
