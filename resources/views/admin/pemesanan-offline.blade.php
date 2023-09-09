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
                  <li class="breadcrumb-item active fw-light" aria-current="page">Pemesanan</li>
                </ol>
              </nav>
            </div>
          </div>
         
          <section class="tables">   
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <div class="card-close">
                    <div class="dropdown">
                      <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                      <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                    </div>
                  </div>
                  <h3 class="h4 mb-0">Pembelian Tiket Offline</h3>
                </div>
                <div class="card-body">
                  <p class="text-sm">Lorem ipsum dolor sit amet consectetur.</p>
                  <form class="form-horizontal" action="/pesan-offline" method="post">
                    @csrf
                    <div class="row gy-2 mb-4">
                      <label class="col-sm-3 form-label" for="inputHorizontalElOne">Nama</label>
                      <div class="col">
                        <input class="form-control" id="inputHorizontalElOne" type="text" placeholder="Name" name="nama">
                      </div>
                    </div>
                    <div class="row gy-2 mb-4">
                      <label class="col-sm-3 form-label" for="inputHorizontalElTwo">NIK</label>
                      <div class="col">
                        <input class="form-control" id="inputHorizontalElTwo" type="text" placeholder="NIK" name="nik">
                      </div>
                    </div>
                    <div class="row gy-2 mb-4">
                      <label class="col-sm-3 form-label" for="inputHorizontalElTwo">Gerbong</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="inputHorizontalElTwo" type="text" placeholder="Gerbong" name="gerbong">
                      </div>
                    </div>
                    <div class="row gy-2 mb-4">
                      <label class="col-sm-3 form-label" for="inputHorizontalElTwo">Kursi</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="inputHorizontalElTwo" type="number" placeholder="Nomor Kursi" max="27" min="1" name="nomor_kursi">
                      </div>
                      <div class="col-sm-3">
                       
                        @if ($getsinglekereta->kelas == 'Ekonomi')
                          <select name="kursi" id="kursi" class="form-select">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                          </select>
                        @else
                        <select name="kursi" id="kursi" class="form-select">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                           
                          </select>
                        @endif
                      </div>
                    </div>
                    <input type="hidden" name="kereta_id" value="{{ $kereta }}">
                    <input type="hidden" name="stasiun_kereta_id" value="{{ $stasiunkereta }}">
                    <div class="row">
                      <div class="col-sm-9 ms-auto">
                        <input class="btn btn-primary" type="submit" value="Signin">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
              
@endsection