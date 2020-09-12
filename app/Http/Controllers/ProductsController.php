<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
