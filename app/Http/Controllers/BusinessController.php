<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Product_Categories;
use App\Products;

class BusinessController extends Controller
{
    public function index()
    {
        $usaha = Business::all();
        return view('pages.business.index', ['data' => $usaha]);
    }

    public function add()
    {
        return view('pages.business.create');
    }

    public function create(Request $request)
    {
        Business::create([
            'nama_usaha' => $request->name,
            'is_active' => $request->is_active
        ]);

        return redirect(url('/admin/usaha'))->with('success','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $usaha = Business::findOrFail($id);
        return view('pages.business.edit', ['data' => $usaha]);
    }

    public function update(Request $request, $id)
    {
        $usaha = Business::findOrFail($id);
        $usaha->nama_usaha = $request->name;
        $process = $usaha->save();

        if ($process) {
            return redirect(url('/admin/usaha'))->with('success','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function delete($id)
    {
        $usaha = Business::find($id);
        $process = $usaha->delete();

        if ($process) {
            return redirect(url('/admin/usaha'))->with('delok','Data Berhasil Dihapus');
        } else {
            return back()->with('delfal','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $usaha = Business::findOrFail($id);
        $usaha->is_active = $request->is_active;
        
        $process = $usaha->save();
    }

    // public function view($id)
    // {
    //     $usaha = Business::findOrFail($id);
    //     $jenis = Product_Categories::where('business_id', $id)->get();
    //     $product = Products::where('business_id', $id)->get();
    //     $min = Product_Categories::where('business_id', $id)->min('id');

    //     // dd($produk);

    //     return view('pages.business.view', ['data' => $usaha, 'kategori' => $jenis, 'produk' => $product, 'min' => $min]);
    // }
}
