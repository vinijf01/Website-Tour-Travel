@extends('layouts.app')

@section('content')

<!-- ==================== Page-Title (Start) ==================== -->
<div class="page-title">


    <div class="link">
      {{-- <a href="../../index.html" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i> --}}
      <span class="page">Upload Bukti Pelunasan</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Register Area (Start) ==================== -->
  <section class="register">

    <form class="form" action="{{route('submit_payment_receipt', $order)}}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
      <h3>Bukti Pelunasan</h3>
      <p>Total Pelunasan : Rp.{{ number_format(($order->harga)- ($order->harga * 0.25)) }}</p>
      <input id="payment_receipt" type="file" class="box" name="payment_receipt" required >

      <button type="submit" class="btn" name="submit" id="submit">submit</button>
    </form>

  </section>
  <!-- ==================== Register Area (End) ==================== -->


@endsection
