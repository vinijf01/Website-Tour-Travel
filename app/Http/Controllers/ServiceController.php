<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //show form create service
    public function create_service()
    {
        return view('service.create_service');
    }

    //insert data to db
    public function store_service(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'kategori' => 'required',
            'pembimbing',
            'rincian' => 'required'
        ]);

        $image = $request->image;
        $name = $request->get('name');
        $slug = Str::slug($image->getClientOriginalExtension());
        $new_image = time() . '_' . $name . '.' . $slug;
        if ($request->kategori == 'umroh') {
            $path = $image->move('upload/umroh/', $new_image);
        } elseif ($request->kategori == 'haji') {
            $path = $image->move('upload/haji/', $new_image);
        } else {
            $path = $image->move('upload/private_umroh/', $new_image);
        }

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
            'kategori' => $request->kategori,
            'pembimbing' => $request->pembimbing,
            'rincian' => $request->rincian
        ]);
        return Redirect::route('index_service');
    }

    //show all service
    public function index_service()
    {
        $services = Service::all();
        return view('service.index_service', compact('services'));
    }

    public function our_service()
    {
        $services = Service::all();
        return view('our_service', compact('services'));
    }

    //filtering by atribute (method where)
    public function umroh_service()
    {
        $services = Service::where('kategori', 'LIKE', 'umroh')->get();
        return view('service.umroh_service', compact('services'));
    }

    public function haji_service()
    {
        $services = Service::where('kategori', 'LIKE', 'haji')->get();
        return view('service.haji_service', compact('services'));
    }

    public function paket_service()
    {
        $services = Service::where('kategori', 'LIKE', 'paket')->get();
        return view('service.paket_service', compact('services'));
    }

    public function detailService($id)
    {
        $detail = DB::table('services')
            ->where('id', $id)
            ->get();
        return view('service.detail_service', compact('detail'));
    }

    //show detail service
    public function show_service(Service $service)
    {
        $layanans = Service::all();
        return view('service.show_service', compact('service', 'layanans'));
    }

    //form edit
    public function edit_service(Service $service)
    {
        return view('service.edit_service', compact('service'));
    }

    //update data service to db
    public function update_service(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'kategori' => 'required',
            'pembimbing',
            'rincian' => 'required'
        ]);
        $image = $request->image;
        $name = $request->get('name');
        $slug = Str::slug($image->getClientOriginalExtension());
        $new_image = time() . '_' . $name . '.' . $slug;
        if ($request->kategori == 'umroh') {
            $path = $image->move('upload/umroh/', $new_image);
        } elseif ($request->kategori == 'haji') {
            $path = $image->move('upload/haji/', $new_image);
        } else {
            $path = $image->move('upload/private_umroh/', $new_image);
        }


        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
            'kategori' => $request->kategori,
            'pembimbing' => $request->pembimbing,
            'rincian' => $request->rincian
        ]);
        //  return Redirect::route('index_service', $service);
        return redirect()->route('index_service');
    }



    //delete service
    public function delete_service(Service $service)
    {

        //delete image
        if ($service->kategori == "umroh") {
            Storage::delete('upload/umroh/' . $service->image);
        } elseif ($service->kategori == "haji") {
            Storage::delete('upload/haji' . $service->image);
        } else {
            Storage::delete('upload/private_umroh' . $service->image);
        }

        //delete service
        $service->delete();

        return Redirect::route('index_service'); //->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
