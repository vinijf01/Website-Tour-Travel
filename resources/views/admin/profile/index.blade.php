@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Profile
    </div>
    
    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('profile.create') }}" role="button">Buat profile</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Keterangan</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($profile->count() > 0)
                @foreach($profile as $item)
                <tr>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->ket}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('profile.destroy', $item->id) }}" method="POST">
                            
                            <a href="{{ route('profile.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada profile.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $profile->links() }}
    </div>
@endsection
