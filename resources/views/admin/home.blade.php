@extends('layout.app')

<style>
  .error{
    color: red;
  }
</style>
@section('content')
@if (count($errors)>0)
<script>
      $(document).ready(function(){
        $('#myModal').modal('show')
      });
    </script>
@endif
@if (count($errors)>0)
<script>
      $(document).ready(function(){

      $('#myModal'+this).modal('show')
      });
    </script>
@endif
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
                                    <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Kelas</label>
                                  <input class="form-control @error('kelas')
                                  @enderror" id="modalInputEmail1" type="text" name="kelas">
                                  @error('kelas')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Harga</label>
                                  <input class="form-control @error('harga')
                                  @enderror" id="modalInputEmail1" type="number" name="harga">
                                  @error('harga')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Berangkat</label>
                                
                                  <select name="stasiun_from_id" id="" class="form-select @error('stasiun_from_id')
                                    
                                  @enderror">
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                  @error('stasiun_from_id')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Berangkat</label>
                                  <input class="form-control @error('jam_berangkat')
                                  @enderror" id="modalInputEmail1" type="time" name="jam_berangkat">
                                  @error('jam_berangkat')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Tujuan</label>
                                  <select name="stasiun_to_id" id="" class="form-select @error('stasiun_to_id')
                                  @enderror">
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                  @error('stasiun_to_id')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Tujuan</label>
                                  <input class="form-control @error('jan_tujuan')
                                  @enderror" id="modalInputEmail1" type="time" name="jam_tujuan">
                                  @error('jam_tujuan')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
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
            
          <div class="modal fade text-start editModal" id="myModal{{ $k->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Edit Kereta</h5>
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
                                  @error('nama_kereta')
                                    <p class="error">{{ $message }}</p>
                                  @enderror
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
                                  <select name="stasiun_from_id" id="" class="form-select">
                                    <option value="{{ $k->stasiunFrom->id }}" selected>{{ $k->stasiunFrom->nama_stasiun }}</option>
                                    <option value="" disabled>-----</option>
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Jam Berangkat</label>
                                  <input class="form-control" id="modalInputEmail1" type="time" name="jam_berangkat" value="{{ $k->jam_berangkat }}">
                                  
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Stasiun Tujuan</label>
                                  <select name="stasiun_to_id" id="" class="form-select">
                                      <option value="{{ $k->stasiunTo->id }}" selected>{{ $k->stasiunTo->nama_stasiun }}</option>
                                      <option value="" disabled>-----</option>
                                    @foreach ($stasiun as $s)
                                      <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                                    @endforeach
                                  </select>
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
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $no = 1;
                            @endphp
                            @foreach ($kereta as $k )
                              
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $k->nama_kereta }}</td>
                              <td>{{ $k->kelas }}</td>
                              <td>Rp {{ number_format($k->harga) }}</td>
                              <td>{{ $k->stasiunFrom->nama_stasiun }}  {{ $k->jam_berangkat }}</td>
                              <td>{{ $k->stasiunTo->nama_stasiun }}  {{ $k->jam_tujuan }}</td>
                              <td>
                                <button class="btn btn-success" type="button" data-bs-target="#myModal{{ $k->id }}" data-bs-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                                <form action="{{ route('deletekereta',$k->id) }}" method="POST">
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
