@extends('layout.app')
@push('css_layout')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush
@section('auth')
<div class="container mt-1">
        <h1 class="title text-center">Registration</h1>
        <form class="mt-3" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="details">

                <div class="input-box">
                    <label for=" username">Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your username" autocomplete="off" >
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <label for=" username">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Enter your NIK" autocomplete="off" >
                    @error('nik')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                 <div class="input-box">
                    <label for=" username">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter your address" autocomplete="off" >
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <label for=" username">Nomor Telepon</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter your number phone" autocomplete="off" >
                    @error('phone')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email" autocomplete="off" >
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <label for=" password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" >
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <label for=" password2">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm your password" name="password_confirmation" >
                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror

                </div>
            </div>

           
            <button type="submit" class="btn btn-primary mt-2">Register</button>
           
        </form>

        <div class="login-link">
            <p>if you have account </p><a href="/login">Login</a>
        </div>

    </div>
@endsection