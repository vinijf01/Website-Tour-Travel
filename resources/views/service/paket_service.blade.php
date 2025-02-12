@extends('layouts.app')

@section('content')
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Services</h2>
        </div>
        <div class="link">
            <a href="{{ route('welcome') }}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Service</span>
        </div>

    </div>
    <!-- ==================== Page-Title (End) ==================== -->

    <!-- ==================== Services Area (Start) ==================== -->

    <section class="services">
        <div class="box-container">
            @foreach ($services as $service)
                <div class="swiper-slide service-item">
                    <div class="image">
                        <img src="{{ url('storage/' . $service->image) }}" alt="Service-Image" height="100px">
                    </div>
                    <div class="content">
                        <a href="{{ route('show_service', $service) }}">
                            <h3>{{ $service->name }}</h3>
                        </a>
                        <p>{{ $service->rincian }}</p>
                    </div>
                </div>
            @endforeach

    </section>
    <!-- ==================== Services Area (End) ==================== -->
@endsection
