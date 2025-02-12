@extends('admin.beranda')

@section('Admincontent')
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All User
    </div>
    

    <div class="card-body">
        <table  class="table" id="datatablesSimple">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No HP</th>
                </tr>
            </thead>

            <tbody>
                @if($user->count() > 0)
                @foreach ($user as $no => $item)
                <tr>
                    <td>{{ $no + 1 }}</td> 
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->nohp}}</td>
                 
              
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10" align="center"> Tidak ada user.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $user->links() }}
    </div>
@endsection
