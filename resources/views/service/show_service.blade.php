@extends('layouts.app')

@section('content')

    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Service Detail</h2>
        </div>

        <div class="link">
            <a href="{{ route('welcome') }}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Service Details</span>
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

            <div class="image">
                <div class="main">
                    <img src="{{ asset($service->image) }}" alt="Service-Image" height="100px">
                </div>
            </div>

            <div class="content">
                <div class="text">
                    <h3 class="price" style="margin-top: -100px">{{ $service->name }}</h3>

                    <head>
                        <title>Data Jamaah</title>
                        <link rel="stylesheet"
                            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
                            crossorigin="anonymous">
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                        </script>
                    </head>

                    <div class="container">
                        <section class="register">

                            <form class="form" action="{{ route('store_jamaah', $service) }}"
                                style="width: 360px; padding: 2rem;" method="post">
                                {{ csrf_field() }}
                                <div class="field_wrapper">
                                    <div class="form-group">
                                        <div class="row">
                                            <div style="text-align: left; font-size:15px">Profile Jamaah</div>
                                            <div class="col-md-10">
                                                <input class="box" placeholder="Nama Jamaah" type="text"
                                                    name="full_name[]" value="" required>
                                            </div>
                                            <select name="type[]" placeholder="type room" id="box" class="box">
                                                <option value="{{ $service->price }}">{{ $service->price }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <a class="btn btn-success" href="javascript:void(0);" id="add_button"
                                        title="Add field">➕TAMBAH</a>
                                </div>

                                <button class="btn btn-lg btn-primary" type="submit">✈Booking</button>
                                <a href="https://wa.me/0822111111" class="btn btn-lg btn-primary" type="submit">📞Tanya
                                    CS</a>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        var maxField = 3; //Input fields increment limitation
                                        var addButton = $('#add_button'); //Add button selector
                                        var wrapper = $('.field_wrapper'); //Input field wrapper
                                        var fieldHTML = '<div class="form-group add"><div class="row">';
                                        fieldHTML = fieldHTML +
                                            '<div style="text-align: left; font-size:15px">Profile Jamaah</div><div class="col-md-10"><input class="box" placeholder="Nama Jamaah" type="text" name="full_name[]" /></div>   <select  name="type[]" placeholder="price" id="type[]" class="box">   <option value="{{ $service->price }}">{{ $service->price }}</select>'


                                        fieldHTML = fieldHTML +
                                            '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
                                        fieldHTML = fieldHTML + '</div></div>';
                                        var x = 1; //Initial field counter is 1

                                        //Once add button is clicked
                                        $(addButton).click(function() {
                                            //Check maximum number of input fields
                                            if (x < maxField) {
                                                x++; //Increment field counter
                                                $(wrapper).append(fieldHTML); //Add field html
                                            }
                                        });

                                        //Once remove button is clicked
                                        $(wrapper).on('click', '.remove_button', function(e) {
                                            e.preventDefault();
                                            $(this).parent('').parent('').remove(); //Remove field html
                                            x--; //Decrement field counter
                                        });
                                    });
                                </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== Product-Description Area (End) ========== -->
        <section class="event-details">

            <!-- ========== Event Info Container (Start) ========== -->
            <div class="show-detail">
                <div class="content">
                    <h3 class="main-heading">Deskripsi</h3>
                    <p>{!! $service->description !!}</p>
                </div>

            </div>
            <!-- ========== Event Info Container (End) ========== -->


            <!-- ========== Event Sidebar Area (Start) ========== -->
            <div class="sidebar event-sidebar">

                <!-- Category Area (Start) -->
                <div class="category sidebar-item">

                    <div class="sidebar-heading">
                        <h2>Informasi</h2>
                    </div>

                    <div class="box-container">
                        <div class="item">
                            <a href="#">Syarat Dokumen & Kententuan Pendaftaran</a>
                        </div>
                        <div class="item">
                            <a href="#">Peraturan & Ketentuan Paket</a>
                        </div>
                        <div class="item">
                            <a href="#">Syarat & Ketentuan Pembayaran / Pembatalan</a>
                        </div>
                        <div class="item">
                            <a href="#">Kebijakan Privasi</a>
                        </div>
                        <div class="item">
                            <a href="#">FAQ</a>
                        </div>
                    </div>

                </div>
                <!-- Category Area (End) -->

                <!-- Recent Posts Area (Start) -->
                <div class="recent-post sidebar-item">

                    <div class="sidebar-heading">
                        <h2>Our Galery:</h2>
                    </div>
                    @php
                        $galeri = DB::table('galeri')->get();
                    @endphp
                    <div class="box-container">
                        @php $counter = 0; @endphp
                        @foreach ($galeri as $item)
                            @if ($counter < 3)
                                <div class="recent-item">
                                    <img src="{{ asset($item->gambar) }}" alt="">
                                    <div class="content">
                                        <a class="main-heading" href="Event-Details.html">Tafseer of Quran</a>
                                        <div class="date"><i
                                                class="far fa-calendar"></i><span>{{ date('d M, Y', strtotime($item->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>
                                @php $counter++; @endphp
                            @else
                            @break
                        @endif
                    @endforeach
                </div>


            </div>
            <!-- Recent Posts Area (End) -->
        </div>
        <!-- ========== Event Sidebar Area (End) ========== -->
    </section>

    <!-- ========== Related Products Area (Start) ========== -->
    <div class="related-items">
        <br><br><br>
        <div class="sidebar-heading">
            <h2>Related Service</h2>
        </div>

        <div class="box-container">
            @foreach ($layanans as $serviceAll)
                @if ($serviceAll->name != $service->name && $serviceAll->kategori == $service->kategori)
                    <div class="product-item">
                        <div class="image">
                            <div class="options">
                                <a href="{{ route('show_service', $serviceAll) }}"><i class="far fa-eye"></i></a>
                            </div>
                            <img src="{{ asset($service->image) }}" alt="Service-Image" height="100px">
                        </div>
                        <div class="content">
                            <a href="{{ route('show_service', $service) }}">
                                <h3>{{ $serviceAll->name }}</h3>
                            </a>
                            <div class="price">
                                <p>Start from IDR.{{ $serviceAll->price }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- ========== Related Products Area (End) ========== -->
@endsection
