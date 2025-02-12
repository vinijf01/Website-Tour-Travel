<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slide;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function index()
    {
        $data['slide'] = slide::latest()->paginate(10);
        return view('admin.slide.index', $data);
    }
    public function create()
    {
        return view('admin.slide.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->gambar;
        $name = $request->get('judul');
        $slug = Str::slug($gambar->getClientOriginalExtension());
        $new_gambar = time() . '_' . $name . '.' . $slug;
        $gambar->move('upload/slide/', $new_gambar);

        $data = new slide;

        $data->judul = $request->get('judul');
        $data->gambar = 'upload/slide/' . $new_gambar;
        $data->save();

        return redirect()->route('slide.index')->with('success', 'Berhasil menambahkan slide baru.');
    }
    public function edit($id)
    {
        return view('admin.slide.edit')->with([
            'slide' => slide::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required'

        ]);

        $slide = slide::find($id);

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|image'
            ]);
            File::delete($slide->gambar);
            $gambar = $request->gambar;
            $name = $request->get('judul');
            $slug = Str::slug($gambar->getClientOriginalExtension());
            $new_gambar = time() . '_' . $name . '.' . $slug;
            $gambar->move('upload/slide/', $new_gambar);
            $slide->gambar = 'upload/slide/' . $new_gambar;
        }
        $slide->judul = $request->get('judul');
        $slide->save();

        return redirect()->route('slide.index')->with('success', 'Berhasil mengupdate slide baru.');
    }
    public function destroy($id)
    {
        $slide = slide::find($id);
        File::delete($slide->gambar);
        $slide->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
