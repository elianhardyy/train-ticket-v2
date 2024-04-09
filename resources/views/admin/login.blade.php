@extends('layout.app')
@push('css_layout')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
@endpush
@section('auth')
<div class="mt-5 login-bg">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h1 style="color:white;">Admin Login Page</h1>
            <div class="card px-5 py-5" id="form1">
                <form action="{{ route('adminLogin') }}" method="POST">
                    @csrf
                    @if (session()->has('loginError'))
                        <p style="color: red;">{{ session('loginError') }}</p>
                    @endif
                <div class="form-data" >
                    <div class="forms-inputs mb-4"> <span>Email</span> <input autocomplete="off" type="text" name="email" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                        <div class="invalid-feedback">@error('email')
                            <p>{{ $message }}</p>
                        @enderror</div>
                    </div>
                    <div class="forms-inputs mb-4"> <span>Password</span> <input autocomplete="off" type="password" name="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                        <div class="invalid-feedback">@error('email')
                            <p>{{ $message }}</p>
                        @enderror</div>
                    </div>
                    <div class="mb-3"> <button type="submit" class="btn btn-dark w-100">Login</button> </div>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@push('js_scripts')
<script src="{{asset('js/admin.js')}}"></script>
@endpush
@endsection