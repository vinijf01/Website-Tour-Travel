@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create testimoni</h3></div>
    <div class="card-body">
    <form class="form" action="{{route('testimoni.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <label for="name" class="form-label">Keterangan testimoni</label>
    <input id="ket" type="text" class="form-control" name="ket" placeholder="Keterangan testimoni"><br>

    <label for="name" class="form-label">Nama Member</label>
    <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Member"><br>


</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Create testimoni</button><br>
</form>
</section>
@endsection