<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\profile;


class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = profile::latest()->paginate(10);
        return view('admin.profile.index', $data);
    }
    public function create()
    {
        return view('admin.profile.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'ket' => 'required',
            'judul' => 'required'
        ]);

        $data = new profile;
        $data->ket = $request->get('ket');
        $data->judul = $request->get('judul');
        $data->save();

        return redirect()->route('profile.index')->with('success', 'Berhasil menambahkan profile baru.');
    }
    public function edit($id)
    {
        return view('admin.profile.edit')->with([
            'profile' => profile::find($id)]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'ket' => 'required',
            'judul' => 'required'
        ]);
        
        $profile = profile::find($id);
        $profile->ket = $request->get('ket');
        $profile->judul = $request->get('judul');
        $profile->save();
     
     return redirect()->route('profile.index')->with('success', 'Berhasil mengupdate profile baru.');
    }
    public function destroy($id)
    {
        $profile = profile::find($id);
        $profile->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
    
}
