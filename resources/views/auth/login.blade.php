@extends('layouts.app')

@section('content')
  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>login</h2>
    </div>

    <div class="link">
      <a href="../../index.html" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">login</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->


<section class="login">

    <form class="form" action="{{ route('login') }}" method="POST">
        @csrf
      <h3>login</h3>
      <input type="email" name="email" placeholder="enter your email" id="email" class="box">
      <input type="password" name="password" placeholder="enter your password" id="password" class="box">
      <div class="info">
        <div class="remember">
          <input type="checkbox" name="remember" id="remember-me">
          <label for="remember-me"> remember me </label>
        </div>
        <div class="forgot">
          <a class="link" href="Reset-Password.html">forgot password?</a>
        </div>
      </div>
      <button type="submit" class="btn" name="login" id="login-btn">login</button>
      <p>don't have an account? <a class="link" href="{{ route('register') }}">register</a></p>
    </form>

  </section>
@endsection
