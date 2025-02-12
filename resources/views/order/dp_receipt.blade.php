@extends('layouts.app')

@section('content')

<!-- ==================== Page-Title (Start) ==================== -->
<div class="page-title">


    <div class="link">
      {{-- <a href="../../index.html" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i> --}}
      <span class="page">Upload Bukti Pembayaran</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Register Area (Start) ==================== -->
  <section class="register">
    @php
    $bank = DB::table('bank_admin')
    ->get();
  @endphp
   
    <form class="form" action="{{route('submit_dp_receipt', $order)}}" method="POST" enctype="multipart/form-data">
 
        <h2 class="font-danger font-md">Silahkan Transfer Melalui :</h2>
   
        
            @foreach ($bank as $item)
                <h1 class="font-sm title-color"><strong>*</strong> {{ $item->nama_bank }} - {{ $item->norek }} ( {{ $item->atas_nama }} )</h1>
            @endforeach
    
        @method('patch')
        @csrf
        <br>
      <h3>Bukti Pembayaran</h3>
      <p>Uang Muka yang harus dibayar : Rp.{{ number_format($order->harga  * 0.25) }}</p>
      <input id="dp_receipt" type="file" class="box" name="dp_receipt" required >

      <button type="submit" class="btn" name="submit" id="submit">submit</button>
    </form>

  </section>
  <!-- ==================== Register Area (End) ==================== -->


@endsection
