@extends('layouts.app')

@section('content')
    <!-- ==================== Page-Title (Start) ==================== -->

    <!-- ==================== Page-Title (End) ==================== -->



    <!-- ==================== Product-Details Area (Start) ==================== -->

    <!-- ========== Product-Description Area (Start) ========== -->

    <section class="register">
        <!--<form class="form">-->
        @foreach ($pemesan as $item)

            <div class="summary-list">
                <div class="summary-item">
                    <div class="name box">Detail Pemesan<div>

                        </div>
                        <div class="summary-list">
                            <div class="summary-item">
                                <div class="value box">Status Order</div>
                                {{-- <div class="value box">{{ $item->status}}</div>r --}}
                            </div>


                            <div class="summary-list">
                                <div class="summary-item">
                                    <div class="value box">Nama Pemesan</div>
                                    <div class="value box">{{ $item->name }}</div>
                                </div>
                                <div class="summary-list">
                                    <div class="summary-item">
                                        <div class="value box">No HP Pemesan</div>
                                        <div class="value box">{{ $item->nohp }}</div>
                                    </div>
                                    @forelse($orders as $order)
                                        @php
                                            $total_price = 0;
                                            $dp = 0;
                                            
                                            $total_price += $order->harga;
                                            $dp += $order->harga * 0.25;
                                            $sisa_pembayaran = $total_price - $dp;
                                        @endphp
                                        <br>
                                        <div class="summary-list">
                                            <div class="summary-item">
                                                <div class="name box">Detail Order<div>

                                                    </div>

                                                    <div class="summary-list">
                                                        <div class="summary-item">
                                                            <div class="value box">No Order </div>
                                                            <div class="value box">
                                                                AVIP{{ $order->user_id }}-{{ $order->jamaah_id }}</div>
                                                        </div>

                                                        <div class="summary-list">
                                                            <div class="summary-item">
                                                                <div class="value box">Nama Paket </div>
                                                                <div class="value box">{{ $order->name }}</div>
                                                            </div>

                                                            <div class="summary-list">
                                                                <div class="summary-item">
                                                                    <div class="value box">Jadwal Keberangkatan </div>
                                                                    <div class="value box">{{ $order->short_description }}
                                                                    </div>
                                                                </div>

                                                                <div class="summary-list">
                                                                    <div class="summary-item">
                                                                        <div class="value box">Durasi </div>
                                                                        <div class="value box">{{ $order->durasi }}</div>
                                                                    </div>

                                                                    <div class="summary-list">
                                                                        <div class="summary-item">
                                                                            <div class="value box">Penerbangan Dari </div>
                                                                            <div class="value box">{{ $order->penerbangan }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="summary-list">
                                                                            <div class="summary-item">
                                                                                <div class="value box">Maskapai Penerbangan
                                                                                </div>
                                                                                <div class="value box">
                                                                                    {{ $order->maskapai }}</div>
                                                                            </div>
                                                                            <br>
                                                                            <h4>Detail Jamaah</h4>
                                                                            @foreach ($jamaah as $order)
                                                                                <div class="summary-list">
                                                                                    <div class="summary-item">
                                                                                        <div class="value box">Nama Jamaah
                                                                                        </div>
                                                                                        <div class="value box">
                                                                                            {{ $order->full_name }}</div>
                                                                                    </div>


                                                                                    <div class="summary-list">
                                                                                        <div class="summary-item">
                                                                                            <div class="value box">Paket
                                                                                            </div>
                                                                                            <div class="value box">
                                                                                                {{ $order->type }}</div>
                                                                                        </div>
                                                                                        {{-- @forelse ($pemesan as $item)
        <div class="summary-list">
            <div class="summary-item">
                <div class="name box">Total Harga : 
                <b>{{ number_format($item->harga)}}</b></div>
        </div>
        @empty
        @endforelse --}}
                                                                            @endforeach




                                                                            <!--<div class="summary-item">-->
                                                                            <!--    <div class="name box">Total Harga</div>-->
                                                                            <!--    <div class="value box">Rp.{{ $total_price }}</div>-->
                                                                            <!--</div> -->

                                                                            {{-- {{-- <div class="summary-item">
            <div class="name box">Uang Muka(DP)</div>
            <div class="value box">
                @if ($order->dp_receipt == null)
                     <div class="value box">Rp. 0</div>
                @else
                    <div class="value box">Rp.{{ $dp }}</div>
                @endif
            </div>
        </div> 

        <div class="summary-item">
            <div class="name box">Sisa pembayaran</div>
            <div class="value box">
                @if ($order->dp_receipt == null)
                     <div class="value box">Rp. {{ $total_price }}</div>
                @else
                    <div class="value box">Rp.{{ $sisa_pembayaran }}</div>
                @endif
            </div>
        </div>  --}}

                                                                            @foreach ($orders as $order)
                                                                                <div class="box">
                                                                                    @if ($order->dp_receipt == null)
                                                                                        <a href="{{ route('dp_receipt', $order->id) }}"
                                                                                            class="btn">Upload Pembayaran
                                                                                            1</a>
                                                                                    @else
                                                                                        <a href="{{ url('storage/dp_receipt/' . $order->dp_receipt) }} "
                                                                                            class="btn btn-sm btn-primary">Pembayaran
                                                                                            1</a>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="box">
                                                                                    @if ($order->payment_receipt == null)
                                                                                        <a href="{{ route('payment_receipt', $order->id) }}"
                                                                                            class="btn">Upload Pembayaran
                                                                                            2</a>
                                                                                    @else
                                                                                        <a href="{{ url('storage/payment_receipt/' . $order->payment_receipt) }} "
                                                                                            class="btn btn-sm btn-primary">Pembayaran
                                                                                            2</a>
                                                                                    @endif
                                                                                </div>
                                                                            @endforeach
                                    @endforeach

                                    <div class="summary-item">
                                        <h4 class="font-danger font-md">Silahkan Transfer Melalui :</h4>
                                        <div class="address">
                                            @foreach ($bank as $item)
                                                <h4 class="font-sm title-color"><strong>*</strong> {{ $item->nama_bank }} -
                                                    {{ $item->norek }} ( {{ $item->atas_nama }} )</h4>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="coupon"></div>


                                    {{-- @foreach ($bukti as $item)
        @if ($item->dp_receipt == null)
        @else
            <img src="{{ url('storage/dp_receipt/' . $item->dp_receipt) }} "width="100%" height="50%" >
        @endif
        <br>
        @if ($item->payment_receipt == null)
  
        @else
            <img src="{{ url('storage/payment_receipt/' . $item->payment_receipt) }} "width="100%" height="50%" >
        @endif
@endforeach --}}
                                </div>
                                </form>
        @endforeach


    </section>

    </div>
    </div>
    </div>
    <!-- ========== Product-Description Area (End) ========== -->



    <!-- ========== Related Products Area (Start) ========== -->


    <!-- ========== Related Products Area (End) ========== -->
@endsection
