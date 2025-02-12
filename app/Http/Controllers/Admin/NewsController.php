<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function index()
    {
        $data['news'] = news::latest()->paginate(10);
        return view('admin.news.index', $data);
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'gambar'=>'required|image',
            'deskripsi' => 'required',
            'deskripsi_singkat' => 'required'
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/news/', $new_gambar);

        $data = new news;
   
        $data->judul = $request->get('judul');
        $data->gambar = 'upload/news/'. $new_gambar;
        $data->deskripsi = $request->get('deskripsi');
        $data->deskripsi_singkat = $request->get('deskripsi_singkat');
        $data->save();

        return redirect()->route('news.index')->with('success', 'Berhasil menambahkan news baru.');
    }
    public function edit($id)
    {
        return view('admin.news.edit')->with([
            'news' => news::find($id)]);
    }

     public function update(Request $request, $id)
    {
         $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deskripsi_singkat' => 'required'
          
        ]);
        
        $news = news::find($id);
        
        if($request->hasFile('gambar')) {
            $request->validate([
              'gambar'=>'required|image'
        ]);
        File::delete($news->gambar);
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('upload/news/', $new_gambar);
        $news->gambar = 'upload/news/'. $new_gambar;
    }
     $news->judul = $request->get('judul');
       $news->deskripsi = $request->get('deskripsi');
       $news->deskripsi_singkat = $request->get('deskripsi_singkat');
     $news->save();
     
     return redirect()->route('news.index')->with('success', 'Berhasil mengupdate slide baru.');
    }
    /**
* destroy
*
* @param  mixed $id
* @return void
*/
    public function destroy($id)
    {
        $news = news::find($id);
        File::delete($news->gambar);
        $news->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
      public function show()
    {
        $news = DB::table('news')
        ->get();

        return view('admin.news.show', compact('news'));
    }

    public function detailNews($id)
    {
        $news = DB::table('news')
         ->select('deskripsi','judul','gambar')
        ->where('judul', $id)
        ->get();
        // dd($news);
        return view('admin.news.detail', compact('news')); 
    }
   
}
