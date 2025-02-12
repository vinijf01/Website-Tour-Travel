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
                <h3 class="text-center font-weight-light my-4">Create WhyUs</h3>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('whyus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title" class="form-label">Point </label>
                    <input id="title" type="text" class="form-control" name="title" placeholder="Point alasan"><br>

                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea cols="10" rows="5" id="description" type="text" class="form-control" name="description"
                        placeholder="Deskripsi Informasi"></textarea>
            </div>
        </div>

        <br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="submit" id="submit">Create</button><br>
        <br>

        </form>
    </section>
@endsection
