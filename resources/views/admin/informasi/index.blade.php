@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Informasi
    </div>

    <br> &nbsp; &nbsp;<a class="btn btn-primary" href="{{ route('informasi.create') }}" role="button">Buat Informasi</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($informasi->count() > 0)
                @foreach($informasi as $item)
                <tr>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td><img src="{{asset($item->gambar)}}" width="100"></td>
                     <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('informasi.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('informasi.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a> <br>
                                @csrf
                                @method('DELETE')
                        <br> <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada informasi.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $informasi->links() }}
    </div>
@endsection
