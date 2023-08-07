@extends('layout.app')
@push('css_layout')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('auth')
<div class="wrapper">
        <div class="title">Login Form</div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (session()->has('loginError'))
                <p>{{ session('loginError') }}</p>
            @endif
            <div class="field">
                <input type="text" name="email" autocomplete="off">
                <label>Email Address</label>
            </div>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <div class="field">
                <input type="password" name="password">
                <label>Password</label>
            </div>
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <br>
            <div class="field">
                <input type="submit" value="Login">
              
            </div>
            <div class="signup-link">Not a member? <a href="/register">Signup now</a></div>
            <div class="back">
                <a href="/"> &laquo;Back</a>
            </div>
        </form>
    </div>
@endsection