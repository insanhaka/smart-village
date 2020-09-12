<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $berita = News::orderBy('id', 'desc')->paginate(8);
        return view('pages.news.index', ['data' => $berita]);
    }

    public function add()
    {
        return view('pages.news.create');
    }

    public function create(Request $request)
    {
        $news = new News;
        $news->judul = $request->judul;
        $news->isi = $request->isi;
        $news->is_active = $request->is_active;
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
        if($file == null){
            $nama_file = "";
            $news->gambar = $nama_file;
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'news_picture';
            $file->move($tujuan_upload,$nama_file);
            $news->gambar = $nama_file;
        }
        $process = $news->save();
        if ($process) {
            return redirect(url('/admin/berita'))->with('success','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function view($id)
    {
        $news = News::findOrFail($id);
        return view('pages.news.view', ['berita' => $news]);
    }

    public function edit($id)
    {
        $berita = News::findOrFail($id);
        return view('pages.news.edit', ['data' => $berita]);
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('gambar');

        $berita = News::findOrFail($id);

        if($file == null){
            // $berita = News::findOrFail($id);
            $process = $berita->update($request->all());
            if ($process) {
                return redirect(url('/admin/berita/'.$id.'/view'))->with('success','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }else{
            $nama_file = time()."_".$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'news_picture';
            $file->move($tujuan_upload,$nama_file);
            $berita->update($request->all());
            $process = $berita->update(['gambar' => $nama_file]);
            if ($process) {
                return redirect(url('/admin/berita/'.$id.'/view'))->with('success','Data Berhasil Disimpan');
            } else {
                return back()->with('warning','Data Gagal Disimpan');
            }
        }

    }

    public function delete($id)
    {
        $berita = News::find($id);
        $process = $berita->delete();

        if ($process) {
            return redirect(url('/admin/berita'))->with('delok','Data Berhasil Dihapus');
        } else {
            return back()->with('delfal','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $berita = News::findOrFail($id);
        $berita->is_active = $request->is_active;
        
        $process = $berita->save();
    }
}
