@extends('layout.app')
@section('content')
<header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <div class="container-fluid px-0">
      <h2 class="mb-0 p-1">Daftar Kereta</h2>
    </div>
</header>
<div class="bg-white">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3">
          <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
          <li class="breadcrumb-item active fw-light" aria-current="page">Staff</li>
        </ol>
      </nav>
    </div>
  </div>
  <section class="tables">   
    <div class="container-fluid">
          <div class="card mb-0">
            <div class="card-header">
              <div class="card-close">
                <div class="dropdown">
                  <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                  <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                </div>
              </div>
              <h3 class="h4 mb-0">Staff </h3>
              <br>
              <button class="btn btn-primary" type="button" data-bs-target="#myModal" data-bs-toggle="modal">Tambah Staff</button>
              
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-sm table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Nomor Telepon</th>
                      <th>NIK</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($staff as $s )
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $s->username }}</td>
                      <td>{{ $s->email }}</td>
                      <td>{{ $s->address }}</td>
                      <td>{{ $s->phone }} </td>
                      <td>{{ $s->nik }}</td>
                      <td>
                        <button class="btn btn-success" type="button" data-bs-target="#myModal{{ $s->id }}" data-bs-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                        <form action="{{ route('deletekereta',$s->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger delete_confirm"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                   
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
     
    </div>
  </section>
@endsection