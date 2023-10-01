@extends('layout.app')
@push('js_scripts')

<script>
  $('.delete_confirm').click(function(event){
    var form = $(this).closest("form");
    event.preventDefault();
    swal.fire({
      title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
    }) .then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your data has been deleted.',
                'success'
                )
            }
      })
  })
 
 
</script>
@endpush
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
                  <li class="breadcrumb-item active fw-light" aria-current="page">Pemesanan</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Tambah Kereta</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Tambah jadwal kereta api</p>
                              <form action="{{ route('postkereta') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Nama Kereta</label>
                                  <input class="form-control @error('nama_kereta')
                                    is-invalid
                                  @enderror" id="modalInputEmail1" type="text" name="nama_kereta">
                                  @error('nama_kereta')
                                    <p>{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Kelas</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="kelas">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Harga</label>
                                  <input class="form-control" id="modalInputEmail1" type="number" name="harga">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Berangkat</label>
                                
                                  <select name="stasiun_from_id" id="" class="form-select">
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Berangkat</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_berangkat">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Tujuan</label>
                                  <select name="stasiun_to_id" id="" class="form-select">
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Tujuan</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_tujuan">
                                  
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
          @foreach ($kereta as $k )
            
          <div class="modal fade text-start" id="myModal{{ $k->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Tambah Kereta</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Edit jadwal kereta api</p>
                              <form action="{{ route('editkereta',$k->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Nama Kereta</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="nama_kereta" value="{{ $k->nama_kereta }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Kelas</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="kelas" value="{{ $k->kelas }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Harga</label>
                                  <input class="form-control" id="modalInputEmail1" type="number" name="harga" value="{{ $k->harga }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Berangkat</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="berangkat" value="{{ $k->berangkat }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Berangkat</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_berangkat" value="{{ $k->jam_berangkat }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Tujuan</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="tujuan" value="{{ $k->tujuan }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Tujuan</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_tujuan" value="{{ $k->jam_tujuan }}">
                                  
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
                      <h3 class="h4 mb-0">Data Penumpang Online</h3>
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
                              <th>Nama Pemesan</th>
                              <th>Nama Kereta</th>
                              <th>Kelas</th>
                              <th>Harga</th>
                              <th>Berangkat</th>
                              <th>Tujuan</th>
                              <th>Waktu Pesan</th>
                              <th>Waktu Beli</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $no = 1;
                            @endphp
                            @foreach ($pass as $p )
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $p->user->first_name }} {{ $p->user->last_name }}</td>
                              <td>{{ $p->kereta->nama_kereta }}</td>
                              <td>{{ $p->kereta->kelas }}</td>
                              <td>Rp {{ number_format($p->kereta->harga) }}</td>
                              <td>{{ $p->stasiunkereta->stasiunFrom->nama_stasiun }}</td>
                              <td>{{ $p->stasiunkereta->stasiunTo->nama_stasiun }}</td>
                              <td>{{ $p->tanggal_pesan }}</td>
                              <td>{{ $p->created_at }}</td>
                              <td><a href="/pemesanan/{{ $p->id }}" class="badge bg-danger">detail</a></td>    
                            </tr>
                            @endforeach
                           
                          
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                
             
            </div>
          </section>
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
                      <h3 class="h4 mb-0">Data Penumpang Online</h3>
                      <br>
                      <button class="btn btn-primary" type="button" data-bs-target="#myModal" data-bs-toggle="modal">Tambah Kereta</button>
                      
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mb-0 table-striped table-sm table-bordered" id="myTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Pemesan</th>
                              <th>NIK</th>
                              <th>Gerbong</th>
                              <th>Kursi</th>
                              <th>Kelas</th>
                              <th>Harga</th>
                              <th>Tanggal Pesan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                $no=1;
                              @endphp
                              @foreach ($passoffline as $p)
                                <tr>
                                  <td>{{ $no }}</td>
                                  <td>{{ $p->nama }}</td>
                                  <td>{{ $p->nik }}</td>
                                  <td>{{ $p->gerbong }}</td>
                                  <td>{{ $p->kursi }}</td>
                                  <td>{{ $p->kereta->kelas }}</td>
                                  <td>Rp {{ number_format($p->kereta->harga) }}</td>
                                  <td>{{ $p->created_at }}</td>
                                  <td><a href="/pemesanan/{{ $p->id }}" class="badge bg-danger">detail</a></td>
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
@if (count($errors)>0)
    <script>
      $(document).ready(function(){
        $('#myModal').modal('show')

      })
    </script>
  @endif
  <script>
     $(document).ready(function() {
        $('#myTable').DataTable();
    });
    $('.post_confirm').click(function(){
    Swal.fire(
      'Accepted',
      'Nice',
      'success'
    )
  })
  $('.edit_confirm').click(function(){
    Swal.fire(
      'Accepted',
      'Nice',
      'success'
    )
  })
  
  </script>
  
@endpush