<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\WhyUs;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class WhyUsController extends Controller
{
    public function index()
    {
        $data['whyus'] = WhyUs::latest()->paginate(10);
        return view('admin.whyus.index', $data);
    }

    public function create()
    {
        return view('admin.whyus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $data = new WhyUs;
        $data->title = $request->get('title');
        $data->description = $request->get('description');
        $data->save();


        return redirect()->route('whyus.index')->with('success', 'Berhasil menambahkan data baru.');
    }
    public function edit($id)
    {
        return view('admin.whyus.edit')->with([
            'whyus' => WhyUs::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $whyus = WhyUs::find($id);
        $whyus->title = $request->get('title');
        $whyus->description = $request->get('description');
        $whyus->save();

        return redirect()->route('whyus.index')->with('success', 'Berhasil mengupdate data.');
    }
    public function destroy($id)
    {
        $whyus = WhyUs::find($id);
        $whyus->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
