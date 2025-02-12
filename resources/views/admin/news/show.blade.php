@extends('layouts.app')

@section('content')
 <!-- ==================== Page-Title (Start) ==================== -->
 <div class="page-title">

    <div class="title">
      <h2>List Berita</h2>
    </div>
    <div class="link">
        <a href="{{route('welcome')}}" class="fas fa-home"></a>
        <i class="fas fa-angle-double-right"></i>
        <span class="page">Berita</span>
    </div>

 </div>
  <!-- ==================== Page-Title (End) ==================== -->

  <!-- ==================== Services Area (Start) ==================== -->

  <section class="services">
    <div class="box-container">
        @foreach ($news as $article)
      <div class="swiper-slide service-item">
        <div class="image">
            <img src="{{asset($article->gambar)}}" alt="Service-Image" height="100px">
        </div>
        <div class="content">
          <p>{{$article->judul}}</p>
        </div>
       <center>
        <div class="box">
           &nbsp <a href="{{ route('news.detail.news', $article->judul) }}" class="btn">  Detail</a>
        </div>
        </center>
      </div>
    @endforeach


  </section>
  <!-- ==================== Services Area (End) ==================== -->
@endsection
