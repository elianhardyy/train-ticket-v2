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
                              <form action="{{ route('poststasiun') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Nama Stasiun</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="nama_stasiun">
                                  
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
          @foreach ($stasiun as $s )
            
          <div class="modal fade text-start" id="myModal{{ $s->id }}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Tambah Stasiun</h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>tambah stasiun</p>
                              <form action="{{ route('editstasiun',$s->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                  <label class="form-label" for="modalInputEmail1">Nama Kereta</label>
                                  <input class="form-control" id="modalInputEmail1" type="text" name="nama_kereta" value="{{ $s->nama_stasiun }}">
                                  
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
                      <button class="btn btn-primary" type="button" data-bs-target="#myModal" data-bs-toggle="modal">Tambah Stasiun</button>
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
                              <th>Nama Stasiun</th>
                              <th>Kode</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $no = 1;
                            @endphp
                            @foreach ($stasiun as $s )
                              
                            <tr>
                              <th scope="row">{{ $no++ }}</th>
                              <td>{{ $s->nama_stasiun}}</td>
                              <td>{{ $s->slug}}</td>
                              <td>
                                <button class="btn btn-success" type="button" data-bs-target="#myModal{{ $s->id }}" data-bs-toggle="modal" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                                <form action="{{ route('deletestasiun',$s->id) }}" method="POST" >
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