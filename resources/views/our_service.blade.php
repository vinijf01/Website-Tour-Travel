@extends('welcome')

@section('OurService')
    <div class="box-container">
        @foreach ($services as $service)
            <div class="service-item">
                <div class="image">
                    <img src="{{ url('storage/' . $service->image) }}" alt="Service-Image" height="100px">
                </div>
                <div class="content">
                    <a href="pages/Services/Service-Details.html">
                        <h3>{{ $service->name }}</h3>
                    </a>
                    <p>IDR.{{ $service->price }} | Available Seat: {{ $service->stock }}</p>
                    <p>{{ $service->short_description }}</p>
                </div>
            </div>
        @endforeach

    </div>
@endsection
