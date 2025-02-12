@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create News</h3></div>
    <div class="card-body">
        
    <form class="form" action="{{route('news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name" class="form-label">Judul Berita</label>
    <input id="judul" type="text" class="form-control" name="judul" value="{{ $news->judul}}" placeholder="Judul Slide"><br>
    
    
    <label for="name" class="form-label">Deskripsi Pendek Berita</label>
    <textarea cols="10" rows="5" id="deskripsi_singkat" type="text" class="form-control" name="deskripsi_singkat" value="{{ $news->deskripsi_singkat}}" placeholder="Deskripsi Pendek Berita"></textarea><br>
    
    
    <label for="name" class="form-label">Deskripsi Berita</label>
    <textarea cols="10" rows="10" id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ $news->deskripsi}}" placeholder="Deskripsi Berita"></textarea><br>

    <label for="image" class="form-label">Gambar Slide</label>
    <input id="gambar" type="file" class="form-control" name="gambar"  placeholder="gambar"><br>
</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update News</button><br>
<br></br>
</form>
</section>
@endsection