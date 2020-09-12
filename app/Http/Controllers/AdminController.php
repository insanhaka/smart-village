<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pages.user.index', ['data' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Roles::all();
        return view('pages.user.edit', ['data' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $roles_id = $request->roles_id;

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $role = Roles::findOrFail($roles_id);
        $user->syncRoles($role->name);
        $user->roles_id = $roles_id;
        $process = $user->save();

        if ($process) {
            return redirect(url('/admin/user'))->with('success','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }

        // bcrypt($request->password)
    }

    public function delete($id)
    {
        $user = User::find($id);
        $process = $user->delete();

        if ($process) {
            return redirect(url('/admin/user'))->with('delok','Data Berhasil Dihapus');
        } else {
            return back()->with('delfal','Data Gagal Dihapus');
        }
    }

    public function activation(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $user = User::findOrFail($id);
        $user->is_active = $request->is_active;
        
        $process = $user->save();
    }
}
