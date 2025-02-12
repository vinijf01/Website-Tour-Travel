@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All sertifikasi
    </div>
    
    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('sertifikasi.create') }}" role="button">Buat sertifikasi</a>

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
                @if($sertifikasi->count() > 0)
                @foreach($sertifikasi as $item)
                <tr>
                    <td>{{$item->ket}}</td>
                    <td><img src="{{asset($item->gambar)}}" width="100"></td>
                     <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sertifikasi.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('sertifikasi.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada sertifikasi.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $sertifikasi->links() }}
    </div>
@endsection
