@extends('layouts.app')

@section('content')
<!-- ==================== Page-Title (Start) ==================== -->
<div class="page-title">

    <div class="title">
      <h2>register</h2>
    </div>

    <div class="link">
      <a href="../../index.html" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">register</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Register Area (Start) ==================== -->
  <section class="register">

    <form class="form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <h3>register</h3>
      <input id="name" type="text" class="box @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="enter your name">
      <input id="email" type="email" class="box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="enter your email">
      <input id="nohp" type="number" class="box @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp" placeholder="enter your number phone">
      <input id="password" type="password" class="box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="enter your password">
      <input id="password-confirm" type="password" class="box" name="password_confirmation" required autocomplete="new-password" placeholder="repeat your password">
      {{-- <input id="image" type="file" class="box @error('image') is-invalid @enderror" name="image" required autocomplete="image" autofocus placeholder="enter your profile"> --}}
      <div class="col-md-6">
            <select  name="role" placeholder="chose your role" id="name" class="box">
                <option value="">Chose Your Role</option>
                <option value="member">Member</option>
                <option value="marketing">Marketing</option>
            </select>
      </div>

      <div class="terms">
        <input type="checkbox" name="remember-me" id="remember-me">
        <label for="remember-me"> i agree with the <span>terms & conditions</span> </label>
      </div>
      <button type="submit" class="btn" name="register" id="register">register</button>
      <p>already have an account? <a class="link" href="{{ route('login') }}">login</a></p>
    </form>

  </section>
  <!-- ==================== Register Area (End) ==================== -->

@endsection

