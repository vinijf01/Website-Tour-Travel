@extends('admin.beranda')

@section('Admincontent')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Halaman Data Jamaah</h2>
      </div>
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif

<table class="table table-bordered">
  <tr>
   
      <th>Nama</th>
      <th>No. HP</th>
      <th>Aksi</th>

  </tr>
  @foreach ($jamaah as $ref)
      <tr>
    
          <td>{{ $ref->full_name }}</td>
          <td>{{ $ref->nohp }}</td>
           <td><a href= "{{ route('list_data.detail', $ref->id) }}" class="btn btn-primary">Detail Data Jamaah</a>
       
              <a href="{{ route('detail_edit_jamaah', $ref->id) }}" class="btn btn-primary">Isi Data Jamaah</a>
            </td>
      </tr>
  @endforeach
  
</table>
@endsection