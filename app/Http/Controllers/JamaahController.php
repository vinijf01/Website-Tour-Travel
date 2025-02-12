<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Jamaah;
use App\Models\JamaahDetail;
use App\Models\Order;
use App\Models\Service;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class JamaahController extends Controller
{


    public function create_jamaah(Service $service, $id)
    {
        $data = Jamaah::join('jamaah_details as details', 'jamaahs.id', 'details.jamaah_id')
            ->join('services', 'jamaahs.service_id', 'services.id')
            ->where('jamaahs.id', $id)
            ->get();

        // dd($data);
        $data1 = DB::table('jamaahs')
            ->where('id', $id)
            ->limit(1)
            ->get();

        // dd($data);

        // $service = DB::table('services')
        // ->where('id', $id)
        // ->get();
        // dd($id);


        return view('order.create', compact('data', 'service', 'data1'));
    }


    //insert data to db
    //ada di show service
    public function store_jamaah(Service $service, Request $request)
    {

        $user_id = Auth::id();
        $service_id = $service->id;

        $jamaah = new Jamaah;
        $jamaah->user_id = $user_id;
        $jamaah->service_id = $service_id;
        $jamaah->save();
        for ($x = 0; $x < count($request->full_name); $x++) {
            $data = new JamaahDetail;
            $ex = explode("-", $request->type[$x]);

            $data->jamaah_id = $jamaah->id;
            $data->full_name = $request->full_name[$x];
            $data->type      = $request->type[$x];
            $data->harga     = $service->price;
            $data->save();
        }
        $call  = JamaahDetail::whereJamaahId($jamaah->id)->get();
        $total = JamaahDetail::whereJamaahId($jamaah->id)->select('harga')->sum('harga');
        $update = Jamaah::find($jamaah->id);
        $update->jumlah_jamaah = $call->count();
        $update->total_harga = $total;
        $update->save();


        return redirect()->route('create_jamaah', $jamaah->id);
    }


    public function detail_edit_jamaah(JamaahDetail $jamaahDetail)
    {
        return view('jamaah.detail_jamaah', compact('jamaahDetail'));
    }


    public function detail_update_jamaah(JamaahDetail $jamaahDetail, Order $order, Request $request)
    {


        $jamaah = JamaahDetail::findOrFail($jamaahDetail->id);

        File::delete($jamaah->foto_ktp);
        $foto_ktp = $request->foto_ktp;
        $slug = Str::slug($foto_ktp->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $foto_ktp->move('upload/ktp/', $new_gambar);
        $jamaah->foto_ktp = 'upload/ktp/' . $new_gambar;

        //pas foto
        File::delete($jamaah->pas_foto);
        $pas_foto = $request->pas_foto;
        $slug = Str::slug($pas_foto->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $pas_foto->move('upload/pasfoto/', $new_gambar);
        $jamaah->pas_foto = 'upload/pasfoto/' . $new_gambar;

        //Passprt
        File::delete($jamaah->passport);
        $passport = $request->passport;
        $slug = Str::slug($passport->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $passport->move('upload/passport/', $new_gambar);
        $jamaah->passport = 'upload/passport/' . $new_gambar;

        $user_id = Auth::id();
        $order_id = $order->id;

        $jamaah->update([
            'full_name'     => $request->full_name,
            'order_id' => $request->order_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'no_ktp' => $request->no_ktp,
            'nama_ayah' => $request->nama_ayah,
            'no_passport' => $request->no_passport,
            'tempat_passport' => $request->tempat_passport,
            'tanggal_passport' => $request->tanggal_passport,
            'masa_berlaku_passport' => $request->masa_berlaku_passport,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'alamat_email' => $request->alamat_email,
            'no_telp_rumah' => $request->no_telp_rumah,
            'riwayat_umrah' => $request->riwayat_umrah,
            'tahun_umrah_terakhir' => $request->tahun_umrah_terakhir,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'riwayat_kesehatan' => $request->riwayat_kesehatan,
            'kontak_darurat' => $request->kontak_darurat,
            'kode_referensi' => $request->kode_referensi,
            'nama_referensi' => $request->nama_referensi
        ]);

        return Redirect::route('index_orderALL')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //show Data User
    public function show_jamaah(Order $order)
    {
        $user = Auth::user();
        $order_id = $order->id;

        // $role = $user->role == 'marketing';
        //   $orders = Order::all();
        $jamaahs = Jamaah::where('user_id', $user->id)->where('order_id', $order_id)->get();
        // return view('jamaah.show_jamaah');
        return view('jamaah.show_jamaah');
    }
    public function dataJamaah($id)
    {
        $data['jamaahDetail'] = DB::table('jamaah_details')
            ->where('id', $id)
            ->get();
        // dd($data);
        return view('jamaah.list_data_jamaah', $data);
    }
}
