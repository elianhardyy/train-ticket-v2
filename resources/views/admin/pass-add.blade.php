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
                  <li class="breadcrumb-item"><a class="fw-light" href="/admin">Home</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Tambah Penumpang</li>
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
                      <h3 class="h4 mb-0">Jadwal Kereta Api</h3>
                     
                    </div>
                    <div class="card-body">
                    <form action="{{ route('keretapem') }}" method="post">
                        @csrf
                        <div class="row mt-4">
                        <div class="col">
                            <label>Berangkat</label><br>
                            <select name="idberangkat"id="berangkat" class="form-select">
                                <option value="" selected>Berangkat</option>
                                @foreach ($stasiun as $s)
                                  <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                @endforeach
                           
                            </select>
                        </div>
                        <div class="col">
                        <label>Tujuan</label><br>
                            <select name="idtujuan" id="tujuan" class="form-select">
                                <option value="" selected>Tujuan</option>
                                @foreach ($stasiun as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                @endforeach
                            
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                    </div>
                  </div>
                
             
            </div>
          </section>
@endsection