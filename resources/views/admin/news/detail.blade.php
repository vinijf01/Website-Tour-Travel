@extends('layouts.app')

@section('content')

    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Berita Detail</h2>
        </div>

        <div class="link">
            <a href="{{ route('welcome') }}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Berita Details</span>
        </div>

    </div>
    <!-- ==================== Page-Title (End) ==================== -->

    <!-- ==================== Product-Details Area (Start) ==================== -->
    <section class="product-details">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        <!-- ========== Product-Description Area (Start) ========== -->
        <div class="product-des">
            @foreach ($news as $item)
                <div class="image">
                    <div class="main">

                        <img src="{{ asset($item->gambar) }}" alt="Service-Image" height="50">
                        <div class="content">
                            <div class="text">
                                <h3>{{ $item->judul }}</h3>

                                <p>{!! $item->deskripsi !!}</p>

                            </div>
                        </div>
            @endforeach
        </div>
        </div>
        </div>
        <!-- ========== Product-Description Area (End) ========== -->
    @endsection
