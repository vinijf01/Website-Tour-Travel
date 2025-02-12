<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\bank;


class BankController extends Controller
{
    public function index()
    {
        $data['bank'] = bank::latest()->paginate(10);
        return view('admin.bank.index', $data);
    }
    public function create()
    {
        return view('admin.bank.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'norek' => 'required',
            'atas_nama' => 'required'
        ]);

        $data = new bank;
        $data->nama_bank = $request->get('nama_bank');
        $data->norek = $request->get('norek');
        $data->atas_nama = $request->get('atas_nama');
        $data->save();

        return redirect()->route('bank.index')->with('success', 'Berhasil menambahkan bank baru.');
    }

    public function edit($id)
    {
        return view('admin.bank.edit')->with([
            'bank' => bank::find($id)]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'nama_bank' => 'required',
            'norek' => 'required',
            'atas_nama' => 'required'
        ]);
        
        $bank = bank::find($id);
        $bank->nama_bank = $request->get('nama_bank');
        $bank->norek = $request->get('norek');
        $bank->atas_nama = $request->get('atas_nama');
        $bank->save();
     
     return redirect()->route('bank.index')->with('success', 'Berhasil mengupdate bank baru.');
    }

    public function destroy($id)
    {
        $bank = bank::find($id);
        $bank->delete();
        
        return back()->with('success','Data berhasil di hapus');
    }
    
}
