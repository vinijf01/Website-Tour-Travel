@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="title">
            <h2>Order</h2>
        </div>
        <div class="link">
            <a href="../../index.html" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Order</span>
        </div>
    </div>
    <section class="cart">
        <div class="shopping-cart">
            <div class='container'>
                <div class="shoplist-title">
                    <h3 class="product-heading">Layanan</h3>
                    <h3>Uang Muka</h3>
                    <h3>Total Harga</h3>
                    <h3>Status</h3>
                    <h3>Detail</h3>
                </div>

                <div class="box-container">
                    @foreach ($orders as $order)
                        <div class="cart-item">
                            <div class="box product">
                                @if ($order->service->kategori == 'haji')
                                    <img src="{{ url('storage/haji/' . $order->service->image) }}" alt="Service-Image"
                                        height="100px">
                                @elseif($order->service->kategori == 'umroh')
                                    <img src="{{ url('storage/umroh/' . $order->service->image) }}" alt="Service-Image"
                                        height="100px">
                                @else
                                    <img src="{{ url('storage/private_umroh/' . $order->service->image) }}"
                                        alt="Service-Image" height="100px">
                                @endif
                                <div class="name">{{ $order->service->name }}</div>
                            </div>

                            <div class="box">{{ number_format($order->harga * 0.25) }}</div>
                            <div class="box">{{ number_format($order->harga) }}</div>
                            <div class="box">{{ $order->status }}</div>

                            <div class="box">
                                <a href="{{ route('order.detail.order', $order->jamaah_id) }}" class="btn">Detail</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </section>
@endsection
