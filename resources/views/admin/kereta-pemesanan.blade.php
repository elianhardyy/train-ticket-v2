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
                    
                    @foreach ($pem as $p)
        <div class="col-md-4">
           
              
              <div class="card">
                 <img src="../trainlogo.png" alt="KAI" width="70">
                 <div class="card-body">
                    <div class="row">
                       <div class="col">
                          <h5 class="card-title">{{ $p->kereta->nama_kereta }}</h5>


                       </div>
                       <div class="col">
                          <p>Rp {{ number_format($p->kereta->harga) }}</p>

                       </div>
                    </div>
                    <div class="row">
                       <div class="col">
                          <p>Berangkat</p>
                          <p>{{ $p->stasiunFrom->nama_stasiun }}</p>

                          <p>{{ $p->jam_kereta_from }}</p>
                          <!-- <input type="hidden" name="jam_berangkat" value="</?= $kt['jam_berangkat'] ?>"> -->
                       </div>
                       <div class="col">
                          <p>Tujuan</p>
                         
                              <p>{{ $p->stasiunTo->nama_stasiun}}</p>
                         
                          <p>{{ $p->jam_kereta_to }}</p>
                       </div>
                    </div>
                    
                    <form action="/pesandulur/{{ $p->kereta->id }}/{{ $p->id }}" method="get">
                      
             
                       <button type="submit" class="btn btn-primary">Pesan</button>
                    </form>
                 </div>
              </div>
          
        </div>
        @endforeach
                  
                    </div>
                  </div>
                
             
            </div>
          </section>
@endsection