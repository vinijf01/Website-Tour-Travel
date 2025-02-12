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
    <form class="form" action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <label for="short_description" class="form-label">Judul Berita</label>
    <input id="deskripsi" type="text" class="form-control" name="judul" placeholder="Judul Berita"><br>
    
     <label for="short_description" class="form-label">Deskripsi Pendek Berita</label>
    <textarea  cols="10" rows="5" id="deskripsi_singkat" type="text" class="form-control" name="deskripsi_singkat"  placeholder="Deskripsi Pendek Berita"></textarea>
    
    <label for="short_description" class="form-label">Deskripsi Berita</label>
    <textarea  cols="10" rows="10" id="deskripsi" type="text" class="form-control" name="deskripsi"  placeholder="Deskripsi Berita"></textarea><br>

    <label for="image" class="form-label">Gambar Berita</label>
    <input id="gambar" type="file" class="form-control" name="gambar" placeholder="gambar"><br>
</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Create Berita</button><br>
<br></br>
</form>
</section>
@endsection