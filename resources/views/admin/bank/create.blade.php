@extends('admin.beranda')

@section('Admincontent')
<section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create bank</h3></div>
    <div class="card-body">
    <form class="form" action="{{route('bank.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <label for="name" class="form-label">Nama Bank</label>
    <input id="nama_bank" type="text" class="form-control" name="nama_bank" placeholder="Nama bank"><br>

    <label for="norek" class="form-label">Nomor Rekening</label>
    <input id="norek" type="number" class="form-control" name="norek" placeholder="Nomor Rekening"><br>

    <label for="atas_nama" class="form-label">Atas Nama </label>
    <input id="atas_nama" type="text" class="form-control" name="atas_nama" placeholder="Atas Nama"><br>

</div>
</div>
<br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Create bank</button><br>
</form>
</section>
@endsection