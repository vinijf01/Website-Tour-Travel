@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit profile</h3></div>
    <div class="card-body">
    <form class="form" action="{{route('profile.update', $profile->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <label for="name" class="form-label">Judul</label>
        <input id="nama" type="text" class="form-control" name="judul" value="{{ $profile->judul}}" placeholder="Judul"><br>
    
    
        <label for="name" class="form-label">Keterangan profile</label>
    <input id="ket" type="text" class="form-control" name="ket" value="{{ $profile->ket}}" placeholder="Keterangan profile"><br>

 
</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update profile</button><br>
</form>
</section>
@endsection