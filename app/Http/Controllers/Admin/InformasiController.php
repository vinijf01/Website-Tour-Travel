<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\informasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class InformasiController extends Controller
{
    public function index()
    {
        $data['informasi'] = informasi::latest()->paginate(10);
        return view('admin.informasi.index', $data);
    }
    public function create()
    {
        return view('admin.informasi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar'=>'required|image'
        ]);
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/informasi/', $new_gambar);

        $data = new informasi;
        $data->judul = $request->get('judul');
        $data->deskripsi = $request->get('deskripsi');
        $data->gambar = 'upload/informasi/'. $new_gambar;
        $data->save();

        return redirect()->route('informasi.index')->with('success', 'Berhasil menambahkan informasi baru.');
    }
    public function edit($id)
    {
        return view('admin.informasi.edit')->with([
            'informasi' => informasi::find($id)]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);
        
        $informasi = informasi::find($id);
        
        if($request->hasFile('gambar')) {
            $request->validate([
              'gambar'=>'required|image'
        ]);
        File::delete($informasi->gambar);
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/informasi/', $new_gambar);
        $informasi->gambar = 'upload/informasi/'. $new_gambar;
    }
     $informasi->judul = $request->get('judul');
     $informasi->deskripsi = $request->get('deskripsi');
     $informasi->save();
     
     return redirect()->route('informasi.index')->with('success', 'Berhasil mengupdate informasi baru.');
    }

    public function destroy($id)
    {
        $informasi = informasi::find($id);
        File::delete($informasi->gambar);
        $informasi->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
    
}
