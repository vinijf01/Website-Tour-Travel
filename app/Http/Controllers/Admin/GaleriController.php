<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $data['galeri'] = galeri::latest()->paginate(10);
        return view('admin.galeri.index', $data);
    }
    public function create()
    {
        return view('admin.galeri.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'ket' => 'required',
            'gambar'=>'required|image'
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/galeri/', $new_gambar);

        $data = new galeri;
        $data->ket = $request->get('ket');
        $data->gambar = 'upload/galeri/'. $new_gambar;
        $data->save();

        return redirect()->route('galeri.index')->with('success', 'Berhasil menambahkan galeri baru.');
    }
    public function edit($id)
    {
        return view('admin.galeri.edit')->with([
            'galeri' => galeri::find($id)]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'ket' => 'required'
        ]);
        
        $galeri = galeri::find($id);
        
        if($request->hasFile('gambar')) {
            $request->validate([
              'gambar'=>'required|image'
        ]);
        File::delete($galeri->gambar);
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/galeri/', $new_gambar);
        $galeri->gambar = 'upload/galeri/'. $new_gambar;
    }
     $galeri->ket = $request->get('ket');
     $galeri->save();
     
     return redirect()->route('galeri.index')->with('success', 'Berhasil mengupdate galeri baru.');
    }
    public function destroy($id)
    {
        $galeri = galeri::find($id);
        File::delete($galeri->gambar);
        $galeri->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
    
}
