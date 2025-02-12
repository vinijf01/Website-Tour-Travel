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
                <h3 class="text-center font-weight-light my-4">Edit Alasan</h3>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('whyus.update', $whyus->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="title" class="form-label">Point</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $whyus->title }}"
                        placeholder="Point alasan"><br>

                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea cols="10" rows="15" type="text" class="form-control" name="description" placeholder="Deskripsi">
        {{ $whyus->description }}
    </textarea>
            </div>
        </div>
        <br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button><br>
        <br>
        </form>
    </section>

@endsection
