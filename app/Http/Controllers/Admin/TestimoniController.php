<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\testimoni;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TestimoniController extends Controller
{
    public function index()
    {
        $data['testimoni'] = testimoni::latest()->paginate(10);
        return view('admin.testimoni.index', $data);
    }
    public function create()
    {
        return view('admin.testimoni.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'ket' => 'required',
            'nama' => 'required'
        ]);

        $data = new testimoni;
        $data->ket = $request->get('ket');
        $data->nama = $request->get('nama');
        $data->save();

        return redirect()->route('testimoni.index')->with('success', 'Berhasil menambahkan testimoni baru.');
    }
    public function edit($id)
    {
        return view('admin.testimoni.edit')->with([
            'testimoni' => testimoni::find($id)]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'ket' => 'required',
            'nama' => 'required'
        ]);
        
        $testimoni = testimoni::find($id);
        $testimoni->ket = $request->get('ket');
        $testimoni->nama = $request->get('nama');
        $testimoni->save();
     
     return redirect()->route('testimoni.index')->with('success', 'Berhasil mengupdate testimoni baru.');
    }
    public function destroy($id)
    {
        $testimoni = testimoni::find($id);
        $testimoni->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
    
}
