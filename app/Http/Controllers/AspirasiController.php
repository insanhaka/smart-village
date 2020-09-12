<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aspirations;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirations::orderBy('id', 'desc')->get();
        return view('pages.aspiration.index', ['data' => $aspirasi]);
    }

    public function delete($id)
    {
        $aspirasi = Aspirations::find($id);
        $process = $aspirasi->delete();

        if ($process) {
            return redirect(url('/admin/aspirasi'))->with('delok','Data Berhasil Dihapus');
        } else {
            return back()->with('delfal','Data Gagal Dihapus');
        }
    }
}
