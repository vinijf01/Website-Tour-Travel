@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All testimoni
    </div>
    
    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('testimoni.create') }}" role="button">Buat testimoni</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Keterangan</th>
                    <th>Nama Member</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($testimoni->count() > 0)
                @foreach($testimoni as $item)
                <tr>
                    <td>{{$item->ket}}</td>
                    <td>{{$item->nama}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('testimoni.destroy', $item->id) }}" method="POST">
                            
                            <a href="{{ route('testimoni.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada testimoni.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $testimoni->links() }}
    </div>
@endsection
