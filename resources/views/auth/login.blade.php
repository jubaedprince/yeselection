<!-- resources/views/auth/home.blade.php -->
@extends('layouts.master')

@section('title', 'Dashboard: Candidate')

@section('content')
<div class="col-md-6 col-md-offset-3">
  <form role="form" method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-success">Login</button>
  </form>
</div>
@endsection