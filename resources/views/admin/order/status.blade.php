@extends('admin.beranda')

@section('Admincontent')
<div class="container mt-3 mb-3">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	   <li class="breadcrumb-item"><a href="{{ route('index_orderALL') }}">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($status) }}</li>
	  </ol>
	</nav>

	<div class="row">
		<div class="col-md-12">
			<div class="mb-3">
			
				@foreach($stat as $row)
					@if($status==$row)
						<span class="btn btn-sm btn-secondary active">{{ ucfirst($row) }}</span>
					@else
						<a href="{{ route('order.status',$row) }}" class="btn btn-sm btn-secondary">{{ ucfirst($row) }}</a>
					@endif
				@endforeach
			</div>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered datatableO">
							<thead>
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
