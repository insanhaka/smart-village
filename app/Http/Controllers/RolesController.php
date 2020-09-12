<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return view('pages.roles.index', ['data' => $roles]);
    }

    public function add()
    {
        return view('pages.roles.create');
    }

    public function create(Request $request)
    {
        Role::create(['name' => $request->name]);

        return redirect(url('/admin/roles'))->with('success','Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $roles = Roles::findOrFail($id);
        return view('pages.roles.edit', ['data' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $role = Roles::findOrFail($id);
        $role->name = $request->name;
        $process = $role->save();

        if ($process) {
            return redirect(url('/admin/roles'))->with('success','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }

    public function delete($id)
    {
        $role = Roles::find($id);
        $process = $role->delete();

        if ($process) {
            return redirect(url('/admin/roles'))->with('delok','Data Berhasil Dihapus');
        } else {
            return back()->with('delfal','Data Gagal Dihapus');
        }
    }
}
