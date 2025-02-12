@extends('admin.beranda')

@section('Admincontent')
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    All Data Jamaah
</div>
<br>
<div class="card-body">
    <table  class="table" id="datatablesSimple">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Layanan</th>
                <th>Aksi</th>
                <th>Hapus</th>
            </tr>
        </thead>

        <tbody>

  @foreach ($jamaah as $ref)
      <tr>
    
          <td>{{ $ref->full_name }}</td>
          <td>{{  $ref->type }}</td>
           <td><a href= "{{ route('list_data.detail', $ref->id) }}" class="btn btn-primary">Detail Data Jamaah</a>
       
              <a href="{{ route('detail_edit_jamaah', $ref->id) }}" class="btn btn-primary">Isi Data Jamaah</a>
            <td>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jamaah.destroy', $ref->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                </form>
            </td>
      </tr>
  @endforeach
</table>

        {{ $jamaah->links() }}

@endsection