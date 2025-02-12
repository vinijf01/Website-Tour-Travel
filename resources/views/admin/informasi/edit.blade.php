@extends('admin.beranda')

@section('Admincontent')
    <section class="register">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Edit Informasi</h3>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('informasi.update', $informasi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="name" class="form-label">Judul Informasi</label>
                    <input id="judul" type="text" class="form-control" name="judul" value="{{ $informasi->judul }}"
                        placeholder="Judul Informasi"><br>

                    <label for="deskripsi" class="form-label">Deskripsi Informasi</label>
                    <textarea cols="10" rows="15" type="text" class="form-control" name="deskripsi"
                        placeholder="Deskripsi Informasi">
        {{ $informasi->deskripsi }}
    </textarea>
                    <label for="image" class="form-label">Gambar Galeri</label>
                    <input id="gambar1" type="file" class="form-control" name="gambar" placeholder="gambar"><br>
                    <label for="image" class="form-label">Sub Gambar</label>
                    <input id="gambar2" type="file" class="form-control" name="gambar" placeholder="gambar"><br>
                    <label for="image" class="form-label">Sub Gambar</label>
                    <input id="gambar2" type="file" class="form-control" name="gambar" placeholder="gambar"><br>
            </div>
        </div>
        <br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update
            Informasi</button><br>
        <br>
        </form>
    </section>

@endsection
