@extends('admin.beranda')

@section('Admincontent')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <br>
                <center>
                    <h5>Detail Service </h5>
                </center>
                <br>
                <!--<table>-->

                <!--     <thead>-->
                <!--         <tr>-->
                <!--              <th>Description</th>-->
                <!--             <th> Harga Quad  </th>-->
                <!--             <th> Harga Double </th>-->
                <!--             <th> Harga Triple </th>-->
                <!--             <th> Harga Termasuk </th>-->
                <!--             <th> Harga Tidak Termasuk </th>-->
                <!--             <th> Persyaratan </th>-->
                <!--             <th> Informasi </th>-->
                <!--             <th> Itenerary </th>-->
                <!--         </tr>-->
                <!--     </thead>-->
                <!--     <tbody>-->

                @foreach ($detail as $no => $item)
                    <!--             <tr>-->
                    <!--                 <td>{{ $item->description }}</td>-->
                    <!--                 <td>Rp. {{ $item->price }}</td>  -->
                    <!--                 <td>{{ $item->pembimbing }} </td> -->
                    <!--                  <td>{{ $item->rincian }}</td>  -->
                    <!--             </tr>-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="summary-list">

                                        <div class="summary-item">
                                            <b>
                                                <div class="name box">Nama Paket</div>
                                            </b>
                                            <div class="value box">{{ $item->name }}</div>
                                        </div>
                                        <div class="summary-item">
                                            <b>
                                                <div class="name box">Kategori</div>
                                            </b>
                                            <div class="value box">{{ $item->kategori }}</div>
                                        </div>
                                        <div class="summary-item">
                                            <b>
                                                <div class="name box">Deskripsi</div>
                                            </b>
                                            <div class="value box">{{ $item->description }}</div>
                                        </div>
                                        <div class="summary-item">
                                            <b>
                                                <div class="name box">Pembimbing</div>
                                            </b>
                                            <div class="value box">{{ $item->pembimbing }}</div>
                                        </div>
                                        <div class="summary-item">
                                            <b>
                                                <div class="name box">Rincian</div>
                                            </b>
                                            <div class="value box">{{ $item->rincian }}</div>
                                        </div>
                                        <div class="summary-item">
                                            <b>
                                                <div class="name box">Harga</div>
                                            </b>
                                            <div class="value box">Rp. {{ number_format($item->price) }}</div>
                                        </div>
                                    </div>
                @endforeach
                <!--    </tbody>-->

                <!--</table>-->
            @endsection
