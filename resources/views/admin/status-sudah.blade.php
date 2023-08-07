@extends('layout.app')
@section('content')
<header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Daftar Kereta</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="bg-white">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                  <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Kereta</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Modal -->
         
          
          <!-- End Modal -->
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
                      <h3 class="h4 mb-0">Jadwal Kereta Api</h3>
                      <br>
                      <button class="btn btn-primary" type="button" data-bs-target="#myModal" data-bs-toggle="modal">Tambah Kereta</button>
                      
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
                              <th>Nama Kereta</th>
                              <th>Kelas</th>
                              <th>Harga</th>
                              <th>Berangkat</th>
                              <th>Tujuan</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $no = 1;
                            @endphp
                            @foreach ($pemesanansudah as $ps )
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $ps->username }}</td>
                              <td>{{ $ps->nik }}</td>
                              <td>{{ $ps->nomor_kursi }}</td>
                              <td>{{ $ps->gerbong }}</td>
                              <td>Rp {{ number_format($ps->penumpang->kereta->harga) }}</td>
                             
                              
                              
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