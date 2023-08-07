@extends('layout.app')
@section('content')
    <h1>Customer</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection