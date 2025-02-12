@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Informasi
    </div>

    <br> &nbsp; &nbsp;<a class="btn btn-primary" href="{{ route('whyus.create') }}" role="button">Buat Alasan</a>

    <div class="card-body">
        <table class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Point</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if ($whyus->count() > 0)
                    @foreach ($whyus as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('whyus.destroy', $item->id) }}" method="POST">
                                    <a href="{{ route('whyus.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    <br>
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
        {{ $whyus->links() }}
    </div>
@endsection
