@extends('layout.app')
@section('content')
<header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Stasiun</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="bg-white">
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                  <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                  <li class="breadcrumb-item active fw-light" aria-current="page">Stasiun</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Tambah Stasiun</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>tambah stasiun </p>
                              <form action="{{ route('poststasiunkereta') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label">Waktu Keberangkatan</label>
                                  <input type="time" class="form-control" name="jam_kereta_from">
                                  <label for="" class="form-label">Waktu Kedatangan</label>
                                  <input type="time" class="form-control" name="jam_kereta_to">
                                  <label class="form-label">Nama Kereta</label>
                                  
                                  <select name="kereta_id" id="" class="form-select">
                                    @foreach ($kereta as $k)
                                      <option value="{{ $k->id }}">{{ $k->nama_kereta }}</option>
    
                                    @endforeach
                                  </select>
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Berangkat Stasiun</label>
                                 
                                  <select name="stasiun_from_id" id="" class="form-select">
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
    
                                    @endforeach
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Tujuan Stasiun</label>
                                  
                                  <select name="stasiun_to_id" id="" class="form-select">
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
    
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary post_confirm" type="submit">Save changes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
          <!-- End Modal -->
          <!-- Modal Edit -->
          @foreach ($pemberhentian as $s )
            
          <div class="modal fade text-start" id="myModal{{ $s->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Tambah Stasiun</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>tambah stasiun</p>
                              <form action="{{ route('putstasiunkereta',$s->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Berangkat</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_kereta_from" value="{{ $s->jam_kereta_from }}">
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Tujuan</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_kereta_to" value="{{ $s->jam_kereta_to }}">
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Kereta</label>
                                  <select name="kereta_id" id=""  class="form-select">
                                    <option value="{{ $s->kereta->id }}">{{ $s->kereta->nama_kereta }}</option>
                                    <option value="" disabled> ---- </option>
                                    @foreach ($kereta as $kt )
                                      <option value="{{ $kt->id }}">{{ $kt->nama_kereta }}</option>
                                    @endforeach
                                  </select>
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Keberangkatan</label>
                                  <select name="stasiun_from_id" id=""  class="form-select">
                                    <option value="{{ $s->stasiunFrom->id }}">{{ $s->stasiunFrom->nama_stasiun }}</option>
                                    <option value="" disabled> ---- </option>
                                    @foreach ($stasiun as $st )
                                      <option value="{{ $st->id }}">{{ $st->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Tujuan</label>
                                  <select name="stasiun_to_id" id=""  class="form-select">
                                    <option value="{{ $s->stasiunTo->id }}">{{ $s->stasiunTo->nama_stasiun }}</option>
                                    <option value="" disabled> ---- </option>
                                    @foreach ($stasiun as $st )
                                      <option value="{{ $st->id }}">{{ $st->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                  
                                </div>                              
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary edit_confirm" type="submit">Save changes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
          @endforeach
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
                      <h3 class="h4 mb-0">Stasiun</h3>
                      <br>
                      <button class="btn btn-primary" type="button" data-bs-target="#myModal" data-bs-toggle="modal">Tambah Pemberhentian</button>
                      @if (Session::has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mb-0 table-striped table-sm" id="myTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Kereta</th>
                              <th>Harga</th>
                              <th>Berangkat</th>
                              <th>Tujuan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $no = 1;
                            @endphp
                            @foreach ($pemberhentian as $p )
                              
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $p->kereta->nama_kereta }}</td>
                              <td>Rp {{ number_format($p->kereta->harga) }}</td>
                              <td>{{ $p->stasiunFrom->nama_stasiun }}
                                {{ $p->jam_kereta_from }}
                              </td>
                              <td>{{ $p->stasiunTo->nama_stasiun }}
                                {{ $p->jam_kereta_to }}
                              </td>
                              <td>
                                <button class="btn btn-success" type="button" data-bs-target="#myModal{{ $p->id }}" data-bs-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                                <form action="{{ route('deletestasiunkereta',$p->id) }}" method="POST" >
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
@push('js_scripts')
  <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
  </script>
@endpush