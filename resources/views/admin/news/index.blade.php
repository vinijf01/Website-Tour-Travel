@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All News
    </div>
    <br> &nbsp; &nbsp;<a class="btn btn-primary" href="{{ route('news.create') }}" role="button">Buat Berita</a>

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi Pendek</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($news as $news)
                <tr>
                    <td>{{$news->judul}}</td>
                    <td>{{$news->deskripsi_singkat}}</td>
                    <td><img src="{{asset($news->gambar)}}" width="100"></td>
                     <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('news.destroy', $news->id) }}" method="POST"> 
                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-primary">EDIT</a> <br>
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
