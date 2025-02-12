<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\sertifikasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class sertifikasiController extends Controller
{
    public function index()
    {
        $data['sertifikasi'] = sertifikasi::latest()->paginate(10);
        return view('admin.sertifikasi.index', $data);
    }
    public function create()
    {
        return view('admin.sertifikasi.create');
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
        $gambar->move('upload/sertifikasi/', $new_gambar);

        $data = new sertifikasi;
        $data->ket = $request->get('ket');
        $data->gambar = 'upload/sertifikasi/'. $new_gambar;
        $data->save();

        return redirect()->route('sertifikasi.index')->with('success', 'Berhasil menambahkan sertifikasi baru.');
    }
    public function edit($id)
    {
        return view('admin.sertifikasi.edit')->with([
            'sertifikasi' => sertifikasi::find($id)]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'ket' => 'required'
        ]);
        
        $sertifikasi = sertifikasi::find($id);
        
        if($request->hasFile('gambar')) {
            $request->validate([
              'gambar'=>'required|image'
        ]);
        File::delete($sertifikasi->gambar);
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/sertifikasi/', $new_gambar);
        $sertifikasi->gambar = 'upload/sertifikasi/'. $new_gambar;
    }
     $sertifikasi->ket = $request->get('ket');
     $sertifikasi->save();
     
     return redirect()->route('sertifikasi.index')->with('success', 'Berhasil mengupdate sertifikasi baru.');
    }
    public function destroy($id)
    {
        $sertifikasi = sertifikasi::find($id);
        File::delete($sertifikasi->gambar);
        $sertifikasi->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
    
}
