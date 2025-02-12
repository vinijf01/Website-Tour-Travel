@extends('layouts.app')

@section('content')
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">
        <div class="title">
            <h2>Konfirmasi Data</h2>
        </div>

        <div class="link">
            <a href="{{ route('welcome') }}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Konfirmasi Data</span>
        </div>
    </div>

    <section class="cart">
        <!-- ========== Shopping-Cart Area (Start) ========== -->
        <form action="{{ route('store_order', $service) }}" method="post">
            @csrf
            <div class="order-list">
                <div class='container'>
                    <div class="shoplist-title">
                        <h3>Nama</h3>
                        <h3>Jenis Layanan</h3>
                        <h3>Nama Paket</h3>
                        <h3>Harga</h3>
                        <h3>action</h3>
                    </div>

                    <div class="box-container">
                        @foreach ($data as $no => $a)
                            <div class="orderlist-item">
                                <div class="box order-id">{{ $a->full_name }}</div>
                                <div class="box total">{{ $a->kategori }}</div>
                                <div class="box price">{{ $a->harga }}</div>
                                <div class="box status completed">completed</div>
                                <div class="box action"><a href="Order-Details.html" class="icon fas fa-eye"></a></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="cart-summary">
                <div class="summary-list">
                    <div class="summary-item">
                        @forelse ($data1 as $item)
                            <div class="name box">total</div>
                            <div class="value box">{{ number_format($item->total_harga) }}</div>
                        @empty
                        @endforelse
                    </div>
                    <button class="btn" type="submit">Konfirmasi</button>
                </div>
                <div class="coupon"></div>
            </div>
        </form>
    </section>
@endsection
