@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Galeri
    </div>
    
    <br> &nbsp; &nbsp;<a class="btn btn-primary" href="{{ route('galeri.create') }}" role="button">Buat Galeri</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($galeri->count() > 0)
                @foreach($galeri as $item)
                <tr>
                    <td>{{$item->ket}}</td>
                    <td><img src="{{asset($item->gambar)}}" width="100"></td>
                     <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('galeri.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada galeri.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $galeri->links() }}
    </div>
@endsection
