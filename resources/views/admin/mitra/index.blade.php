@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All mitra
    </div>
    
    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('mitra.create') }}" role="button">Buat mitra</a>

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
                @if($mitra->count() > 0)
                @foreach($mitra as $item)
                <tr>
                    <td>{{$item->ket}}</td>
                    <td><img src="{{asset($item->gambar)}}" width="100"></td>
                     <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mitra.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('mitra.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada mitra.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $mitra->links() }}
    </div>
@endsection
