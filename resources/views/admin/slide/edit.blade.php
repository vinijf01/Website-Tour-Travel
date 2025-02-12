@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Slide</h3></div>
    <div class="card-body">
        
    <form class="form" action="{{route('slide.update', $slide->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name" class="form-label">Judul Slide</label>
    <input id="judul" type="text" class="form-control" name="judul" value="{{ $slide->judul}}" placeholder="Judul Slide"><br>

    <label for="image" class="form-label">Gambar Slide</label>
    <input id="gambar" type="file" class="form-control" name="gambar"  placeholder="gambar"><br>
</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Slide</button><br>
</form>
</section>
@endsection