<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\mitra;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MitraController extends Controller
{
    public function index()
    {
        $data['mitra'] = mitra::latest()->paginate(10);
        return view('admin.mitra.index', $data);
    }
    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'ket' => 'required',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->gambar;
        $name = $request->get('ket');
        $slug = Str::slug($gambar->getClientOriginalExtension());
        $new_gambar = time() . '_' . $name . '.' . $slug;
        $gambar->move('upload/mitra/', $new_gambar);

        $data = new mitra;
        $data->ket = $request->get('ket');
        $data->gambar = 'upload/mitra/' . $new_gambar;
        $data->save();

        return redirect()->route('mitra.index')->with('success', 'Berhasil menambahkan mitra baru.');
    }


    public function edit($id)
    {
        return view('admin.mitra.edit')->with([
            'mitra' => mitra::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'ket' => 'required'
        ]);

        $mitra = mitra::find($id);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image'
            ]);
            File::delete($mitra->gambar);
            $gambar = $request->gambar;
            $name = $request->get('ket');
            $slug = Str::slug($gambar->getClientOriginalExtension());
            $new_gambar = time() . '_' . $name . '.' . $slug;
            $gambar->move('upload/mitra/', $new_gambar);
            $mitra->gambar = 'upload/mitra/' . $new_gambar;
        }
        $mitra->ket = $request->get('ket');
        $mitra->save();

        return redirect()->route('mitra.index')->with('success', 'Berhasil mengupdate mitra baru.');
    }
    public function destroy($id)
    {
        $mitra = mitra::find($id);
        File::delete($mitra->gambar);
        $mitra->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
