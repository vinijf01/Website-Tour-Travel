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
                <h3 class="text-center font-weight-light my-4">Update Service</h3>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('update_service', $service) }}" method="post"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <label for="name" class="form-label">Service Name</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Service Name"
                        value="{{ $service->name }}"><br>

                    <label for="price" class="form-label">Price</label>
                    <input id="price" type="number" class="form-control" name="price" placeholder="Service Price"
                        value={{ $service->price }}><br>

                    <label for="exampleFormControlTextarea1" class="form-label"> Deskripsi </label>
                    <textarea id="description" type="text" class="form-control" name="description" rows="20">{{ $service->description }}</textarea><br>

                    <label for="image" class="form-label">Image</label>
                    <input id="image" type="file" class="form-control" name="image" placeholder="image"><br>


                    <label for="image" class="form-label">Select a Category</label>
                    <select name="kategori" placeholder="kategori" id="kategori" class="form-control">
                        <option value="">{{ $service->kategori }}</option>
                        <option value="haji">Haji</option>
                        <option value="umroh">Umroh</option>
                        <option value="private_umroh">Private Umroh</option>
                    </select>

                    <label for="pembimbing" class="form-label">Pembimbing</label>
                    <input id="pembimbing" type="text" class="form-control" name="pembimbing" placeholder="Pembimbing"
                        value="{{ $service->pembimbing }}"><br>

                    <label for="rincian" class="form-label"> Rincian </label>
                    <textarea id="rincian" type="text" class="form-control" name="rincian" rows="20">{{ $service->rincian }}</textarea><br>

            </div>
        </div>
        <br> &nbsp; &nbsp; <button type="submit" class="btn btn-primary" name="update_service" id="update_service">Update
            Service</button>
        <br>
        </form>
        </div>
        </div>
    </section>
@endsection
