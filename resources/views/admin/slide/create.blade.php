@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Slide</h3></div>
    <div class="card-body">
    <form class="form" action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <label for="name" class="form-label">Judul Slide</label>
    <input id="judul" type="text" class="form-control" name="judul" placeholder="Judul Slide"><br>

    <label for="image" class="form-label">Gambar Slide</label>
    <input id="gambar" type="file" class="form-control" name="gambar" placeholder="gambar"><br>
</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Create Slide</button><br>
</form>
</section>
@endsection