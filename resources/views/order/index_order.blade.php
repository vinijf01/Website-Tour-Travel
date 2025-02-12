@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Order
    </div>
    <br>
    <div class="card-header">
		<div class="col-md-12">
			<div class="mb-3">
				<span class="btn btn-sm btn-primary active">Semua</span>
				<a href="{{ route('order.status','Pending') }}" class="btn btn-sm btn-secondary">Pending</a>
				<a href="{{ route('order.status','Proses') }}" class="btn btn-sm btn-secondary">Proses</a>
				<a href="{{ route('order.status','Sukses') }}" class="btn btn-sm btn-secondary">Sukses</a>
				<a href="{{ route('order.status','Batal') }}" class="btn btn-sm btn-secondary">Batal</a>
			</div>
    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Nomor Orderan</th>
                    <th>Status</th>
                    <th>Nama Pemesan</th>
                    <th>Nomor Pemesan</th>
                    <th>Tanggal</th>
                    <th>Harga Layanan</th>
                    <th>Uang Muka</th>
                    <th>Total Biaya</th>
                    {{-- <th>Status</th> --}}
                    <!--<th>Status Order</th>-->
                    <th>Detail Jamaah</th>


                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    {{-- <td>
                        @if($order->service->kategori == "haji")
                        <img src="{{ url('storage/haji/' . $order->service->image) }}" alt="Service-Image" height="100px">
                        @elseif($order->service->kategori == "umroh")
                        <img src="{{ url('storage/umroh/' . $order->service->image) }}" alt="Service-Image" height="100px">
                        @else
                        <img src="{{ url('storage/private_umroh/' . $order->service->image) }}" alt="Service-Image" height="100px">
                        @endif
                    </td> --}}
                    <td>AVIP{{ $order->user_id}}-{{ $order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->nohp}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>Rp. {{ number_format($order->harga) }}</td>
                    <td>
                        @if($order->dp_receipt == null)
                           Belum ada upload
                        @else
                        <a href="{{ url('storage/dp_receipt/' . $order->dp_receipt) }} "
                            class="btn btn-sm btn-primary">Bukti Pembayaran</a>
                        @endif
                    </td>
                    <td>
                    @if($order->payment_receipt == null)
                      Belum ada upload
                    @else
                    <a href="{{ url('storage/payment_receipt/' . $order->payment_receipt) }} "
                        class="btn btn-sm btn-primary">Bukti Pelunasan</a>
                    @endif
                    </td>

                    {{-- <td>
                        @if(!$order->is_paid && $order->payment_receipt == null)
                           Belum Lunas
                        @elseif(!$order->is_paid && $order->payment_receipt != null)
                        <form action="{{ route('confirm_payment', $order->payment_receipt) }}" method="post">
                            @method('put')
                            @csrf
                            <button class="btn btn-success" type="submit">Confirm</button>
                        </form>
                        @else
                            LUNAS
                        @endif
                    </td> --}}

                    <td>
                         {{-- <a class="miriptikus" href="{{ route('list_data.detail', $order->id) }}"><i class="fa fa-pencil"></i></a> --}}

                        {{-- <a class="miriptikus" href="{{ route('detail_edit_jamaah', $order->id) }}"><i class="fa fa-plus"></i></a> --}}

                        <a class="miriptikus" href="{{ route('detail.jamaah', $order->jamaah_id) }}"><i class="fa fa-search"></i></a>
                    <td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
