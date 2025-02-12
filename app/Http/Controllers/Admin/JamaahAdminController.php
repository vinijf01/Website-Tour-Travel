<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use App\Models\JamaahDetail;
use Illuminate\Http\Request;

class JamaahAdminController extends Controller
{
    public function index() 
    {
        $jamaah = JamaahDetail::latest()->paginate(8);
      
        return view('admin.jamaah.index', compact('jamaah'));
    }
    public function destroy($id)
    {
        $jamaah = jamaah::find($id);
        $jamaah->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
}
