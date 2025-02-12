@extends('layouts.app')

@section('content')
<!-- ==================== Page-Title (Start) ==================== -->
<div class="page-title">

    <div class="title">
      <h2>Data Jamaah</h2>
    </div>

    <div class="link">
      <i class="fas fa-angle-double-right"></i>
      <span class="page">Lengkapi Data Profile</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Register Area (Start) ==================== -->
  <section class="register">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    @endif
    <form class="form" action="{{ route('store_jamaah') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <h3>Data Jamaah</h3>
      <input id="full_name" type="text" class="box" name="full_name" required autocomplete="full_name" autofocus placeholder="Nama Lengkap">
      <input id="place_of_birth" type="text" class="box" name="place_of_birth" required autocomplete="place_of_birth" placeholder="Tempat Lahir">
      <input id="date_of_birth" type="date" class="box" name="date_of_birth" required autocomplete="new-password" placeholder="Tanggal Lahir">
      <div class="col-md-6">
        <select  name="gender" placeholder="gender" id="gender" class="box">
            <option value="">Jenis Kelamin</option>
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
        </select>
      </div>
      <input id="address" type="text" class="box" name="address" required autocomplete="address" placeholder="Alamat">
      <div class="col-md-6">
        <select  name="citizenship" placeholder="citizenship" id="citizenship" class="box">
            <option value="">Kewarganegaraan</option>
            <option value="WNI">WNI</option>
            <option value="WNA">WNA</option>
        </select>
      </div>
      <input id="dp_receipt" type="file" class="box" name="dp_receipt" required autocomplete="dp_receipt" autofocus placeholder="Bukti Pembayaran DP">

      <button type="submit" class="btn" name="simpan" id="simpan">Simpan</button>
    </form>

  </section>
  <!-- ==================== Register Area (End) ==================== -->
@endsection

