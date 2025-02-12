@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Service
    </div>

    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('create_service') }}" role="button"> Add Service</a>

    <div class="card-body">
        <table class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Pembimbing</th>
                    <th>Rincian</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>
                            <img src="{{ asset($service->image) }}" alt="Service-Image" height="100px">

                            {{-- @if ($service->kategori == 'haji')
                    <img src="{{ asset($service->image) }}" alt="Service-Image" height="100px">
                    @elseif($service->kategori == "umroh")
                    <img src="{{ url('storage/umroh/' . $service->image) }}" alt="Service-Image" height="100px">
                    @else
                    <img src="{{ url('storage/private_umroh/' . $service->image) }}" alt="Service-Image" height="100px">
                    @endif --}}
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>

                        <td>{{ $service->description }}</td>
                        <td>{{ $service->kategori }}</td>
                        <td>{{ $service->pembimbing }}</td>
                        <td>{{ $service->rincian }}</td>
                        <td>
                            <a href="{{ route('detail-service', $service->id) }}"
                                class="btn btn-sm btn-success">Detail</a><br>
                            <br>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('delete_service', $service->id) }}" method="POST">

                                <a href="{{ route('edit_service', $service) }}" class="btn btn-sm btn-primary">EDIT</a>
                                <br>

                                @csrf
                                @method('DELETE')
                                <br> <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
