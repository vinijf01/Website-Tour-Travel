@extends('admin.beranda')

@section('Admincontent')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div>
                @foreach ($pemesan as $order)
                <h4>Data Pemesan</h4>
                
                Nama Pemesan    : {{ $order->name }}</b> <br>
                Tanggal Orderan : {{ $order->created_at }}<br>
                Email Pemesan   : {{$order->email}}<br>
              
                @endforeach
                <br>
                <h4>Data Order</h4>
                @foreach ($services as $item)
                Nomor Orderan           : AVIP{{ $order->user_id}}-{{ $order->id}}<br>
                Paket                   : {{ $item->name}}<br>
                Jadwal Keberangkatan    : {{ $item->short_description }}</b> <br>
                Available Seat          : {{ $item->stock }}<br>
                Kategori Paket          : {{$item->kategori}}<br>
                Durasi Paket            : {{$item->durasi}}<br> 
                Berangkat Dari          : {{$item->penerbangan}}<br>
                Maskapai                : {{$item->maskapai}}<br>
                Jumlah Jamaah   :  {{$order->jumlah_jamaah}}</br>
                Total           : <b>Rp. {{number_format($order->total_harga)}}</b><br>
                <br>
               </div>   </div>    </div>  
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
 <h4>Data Jamaah</h4>
    <table class="control-form">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jamaah</th>
                <th>Layanan </th>
                <th> Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $no => $a)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $a->full_name }}</td>
                    <td>{{ $a->type }}</td>
                    <td>
                        <a href="{{ route('detail_edit_jamaah', $a->id) }}"><i class="fa fa-pencil-square"></i></a>
                        <a href="{{ route('list-data-detail', $a->id) }}"><i class="fa fa-list"></i></a></a>
                        
                    <td>
                </tr>
            @endforeach
          
        </tbody>
       
    </table>
    <br>
  <label for="cars">Status Order</label>
    <form class="form" action="{{route('update_status', $order->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <select  class="form-control" name="status" placeholder="status" id="status">
            <option value="">Pilih Status</option>
            <option value="Proses">Proses</option>
            <option value="Sukses">Sukses</option>
        </select>
<br> <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Status</button><br>
<br>
</form>


    <br>
 
        @foreach($bukti as $item)

        @if($order->dp_receipt == null)
                       
                    @else
                   
                    <h4> Bukti Pembayaran DP</h4>
                   <img src="{{asset('storage/dp_receipt/' . $order->dp_receipt) }} " width="100%" height="35%" >
                    @endif
                    <br>
        @if($order->payment_receipt == null)
          
                    @else
                        <h4>Bukti Pembayaran Pelunasan</h4>
                          <img src="{{asset('storage/payment_receipt/' . $order->payment_receipt) }} " width="100%" height="35%" >
                    @endif
@endforeach
                @endforeach
            </div>
  
    </div>
   
@endsection