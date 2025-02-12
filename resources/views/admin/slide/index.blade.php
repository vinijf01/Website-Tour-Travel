@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All News
    </div>
    <br> &nbsp; &nbsp; <a class="btn btn-primary" href="{{ route('slide.create') }}" role="button">Buat Slide</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($slide->count() > 0)
                @foreach($slide as $item)
                <tr>
                    <td>{{$item->judul}}</td>
                    <td><img src="{{asset($item->gambar)}}" width="100"></td>
                    <!--<td>-->
                        <!--<form action="{{route('slide.destroy', $item->id)}}" method="post">-->
                        <!--    @csrf-->
                        <!--    @method('DELETE')-->
                        <!--    <a href="{{ route('slide.edit', $item->id)}}" class="btn btn-success"> Update</a>-->
                        <!--</form>-->
                     <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('slide.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('slide.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                    </td>
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada slide.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $slide->links() }}
    </div>
@endsection
