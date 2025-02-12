@extends('layouts.app')

@section('content')
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Layanan Haji</h2>
        </div>
        <div class="link">
            <a href="{{ route('welcome') }}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Haji</span>
        </div>

    </div>
    <!-- ==================== Page-Title (End) ==================== -->

    <!-- ==================== Services Area (Start) ==================== -->

    <section class="services">
        <div class="box-container">
            @foreach ($services as $service)
                <div class="swiper-slide service-item">
                    <div class="image">
                        <img src="{{ asset($service->image) }}">
                    </div>
                    <div class="content">
                        @if (!Auth::check())
                            <a href="{{ route('login') }}">
                                <h3>{{ $service->name }}</h3>
                            </a>
                        @else
                            <a href="{{ route('show_service', $service) }}">
                                <h3>{{ $service->name }}</h3>
                            </a>
                        @endif
                        <p>{!! $service->rincian !!}
                        </p>
                    </div>
                    <a href="{{ route('show_service', $service) }}" class="btn">Lihat Selengkapnya</a>

                </div>
            @endforeach
        </div>
    </section>
    <!-- ==================== Services Area (End) ==================== -->
@endsection
