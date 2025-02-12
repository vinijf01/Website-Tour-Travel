<?php

namespace App\Http\Controllers;

use App\Models\admin\bank;
use App\Models\Jamaah;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\JamaahDetail;
use  Toastr;


class OrderController extends Controller
{

    //show all service
    public function index_order()
    {

        $data['orders'] = DB::table('jamaahs as a')
            ->join('orders as f', 'a.id', 'f.jamaah_id')
            ->join('users as g', 'a.user_id', 'g.id')
            ->select('g.*', 'a.*', 'f.jamaah_id', 'f.is_paid', 'f.dp_receipt', 'f.payment_receipt', 'f.harga', 'f.created_at', 'f.status')
            ->get();

        return view('order.index_order', $data);
    }

    public function statusOrder($status)
    {
        $data['title'] = "Modul Orderan " . ucfirst($status) . " :: Administrator";

        $data['orders'] = DB::table('jamaahs as a')
            ->join('orders as f', 'a.id', 'f.jamaah_id')
            ->join('users as g', 'a.user_id', 'g.id')
            ->select('g.*', 'a.*', 'f.jamaah_id', 'f.is_paid', 'f.dp_receipt', 'f.payment_receipt', 'f.harga', 'f.created_at', 'f.status')
            ->where('f.status', $status)
            ->get();

        $data['stat'] = array('Pending', 'Proses', 'Sukses', 'Batal');
        $data['status'] = $status;

        return view('admin.order.status', $data);
    }

    public function detail($id)
    {

        // $data['service'] = DB::table('services')
        // ->where('id',$id)
        // ->first();
        // dd($data);

        $data['pemesan'] = DB::table('orders as a')
            ->join('users as g', 'a.user_id', 'g.id')
            ->join('jamaahs as b', 'a.jamaah_id', 'b.id')
            ->where('b.id', $id)
            ->get();


        $data['orders'] = DB::table('orders as a')
            ->join('services as b', 'a.service_id', 'b.id')
            ->join('jamaahs as c', 'a.jamaah_id', 'c.id')
            ->join('jamaah_details as d', 'a.jamaah_id', 'd.jamaah_id')
            ->select('a.id', 'a.jamaah_id', 'a.payment_receipt', 'a.dp_receipt', 'a.harga', 'a.created_at', 'a.user_id', 'b.name', 'b.durasi', 'b.short_description', 'b.maskapai', 'b.penerbangan', 'c.jumlah_jamaah', 'c.user_id', 'd.full_name', 'd.type', 'd.harga')
            ->where('c.id', $id)
            ->orderby('a.created_at', 'desc')
            ->limit(1)
            ->get();


        $data['jamaah'] = DB::table('jamaahs as a')
            ->join('jamaah_details as b', 'a.id', 'b.jamaah_id')
            ->where('a.id', $id)
            ->get();
        // dd($data);

        $data['bank'] = bank::get();

        $data['bukti'] = DB::table('orders')
            ->select('dp_receipt', 'payment_receipt')
            ->where('jamaah_id', $id)
            ->get();
        // dd($data);

        return view('order.detail_order', $data);
    }

    public function detailJamaah($id)
    {
        $data['pemesan'] = DB::table('orders as a')
            ->join('users as g', 'a.user_id', 'g.id')
            ->join('jamaahs as b', 'a.jamaah_id', 'b.id')
            ->where('b.id', $id)
            ->get();
        // dd($data);


        $data['orders'] = DB::table('jamaahs as a')
            ->join('jamaah_details as b', 'a.id', 'b.jamaah_id')
            ->where('a.id', $id)
            ->get();
        // dd($data);

        $data['services'] = DB::table('orders as a')
            ->leftjoin('services as b', 'a.service_id', 'b.id')
            ->where('a.jamaah_id', $id)
            ->get();

        $data['bukti'] = DB::table('orders')
            ->select('dp_receipt', 'payment_receipt')
            ->where('jamaah_id', $id)
            ->get();


        //  dd($data);
        return view('admin.jamaah.detail', $data);
    }

    //show Boking
    public function index_order_user()
    {
        $user = Auth::user();
        // $role = $user->role == 'marketing';
        //   $orders = Order::all();
        $orders = Order::where('user_id', $user->id)->get();

        return view('order.index_user', compact('orders'));
    }

    // add product to cart
    public function store_order(Service $service, Jamaah $jamaah, Request $request)
    {
        $user_id = Auth::id();
        $update = DB::table('jamaahs')
            ->orderBy('created_at', 'desc')
            ->first();

        $data = new Order;
        $data->jamaah_id = $update->id;
        $data->user_id = $user_id;
        $data->service_id = $update->service_id;
        $data->harga = $update->total_harga;
        $data->save();


        // return redirect::route('index_order',  $jamaah->id);
        return redirect()->route('order.detail.order', $data->jamaah_id);
    }

    public function dp_receipt(Order $order)
    {
        return view('order.dp_receipt', compact('order'));
    }

    //Submit uang muka
    public function submit_dp_receipt(Order $order, Request $request)
    {
        $file =   $request->file('dp_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/storage/dp_receipt/' . $path, file_get_contents($file));

        $order->update([
            'dp_receipt' => $path
        ]);

        return redirect::route('index_order', $order);
    }

    //Pelunasan
    public function payment_receipt(Order $order)
    {
        return view('order.payment_receipt', compact('order'));
    }

    //Submit uang muka
    public function submit_payment_receipt(Order $order, Request $request)
    {
        $file =   $request->file('payment_receipt');
        $path = time() . '_' . $order->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/storage/payment_receipt/' . $path, file_get_contents($file));

        $order->update([
            'payment_receipt' => $path
        ]);

        return redirect::route('index_order', $order);
    }

    //validasi payment
    public function confirm_payment(Order $order)
    {
        $order->update([
            'is_paid' => true
        ]);
        return Redirect::back();
    }
    public function status(Request $request, $id)
    {
        $order = DB::table('orders')
            ->where('jamaah_id', $id)
            ->update(['status' => $request->get('status')]);

        // $status_order = Order::findOrFail($id);
        // $status_order->status = $request->get('status');

        $jamaah = DB::table('jamaahs')
            ->select('id', 'service_id', 'jumlah_jamaah')
            ->where('id', $id)
            ->first();

        $service = DB::table('services')
            ->select('id', 'stock')
            ->first();


        if ($request->get('status') == "Sukses") {
            DB::table('services')
                ->where('id', $jamaah->service_id)
                ->update([
                    'stock' => $service->stock - $jamaah->jumlah_jamaah
                ]);
        }


        return redirect()->route('index_orderALL')->with('success', 'Berhasil mengupdate Status baru.');
    }
}
