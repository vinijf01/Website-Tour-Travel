@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit bank</h3></div>
    <div class="card-body">
    <form class="form" action="{{route('bank.update', $bank->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <label for="name" class="form-label">Nama Bank</label>
    <input id="nama_bank" type="text" class="form-control" name="nama_bank" value="{{ $bank->nama_bank}}" placeholder="Nama Bank"><br>

    <label for="name" class="form-label">Nomor Rekening</label>
    <input id="norek" type="number" class="form-control" name="norek" value="{{ $bank->norek}}" placeholder="Nomor Rekening"><br>

    <label for="name" class="form-label">Atas Nama</label>
    <input id="atas_nama" type="text" class="form-control" name="atas_nama" value="{{ $bank->atas_nama}}" placeholder="Atas Nama "><br>

</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update bank</button><br>
</form>
</section>
@endsection