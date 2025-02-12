@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Bank
    </div>
    
    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('bank.create') }}" role="button">Buat bank baru</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Nama Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Atas Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($bank->count() > 0)
                @foreach($bank as $item)
                <tr>
                    <td>{{$item->nama_bank}}</td>
                    <td>{{$item->norek}}</td>
                    <td>{{$item->atas_nama}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bank.destroy', $item->id) }}" method="POST">
                            
                            <a href="{{ route('bank.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada data bank.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $bank->links() }}
    </div>
@endsection
