@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Galeri</h3></div>
    <div class="card-body">
    <form class="form" action="{{route('galeri.update', $galeri->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name" class="form-label">Keterangan Galeri</label>
    <input id="ket" type="text" class="form-control" name="ket" value="{{ $galeri->ket}}" placeholder="Keterangan Galeri"><br>

    <label for="image" class="form-label">Gambar Galeri</label>
    <input id="gambar" type="file" class="form-control" name="gambar"  placeholder="gambar"><br>
</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Galeri</button><br>
</form>
</section>
@endsection