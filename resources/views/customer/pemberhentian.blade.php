@extends('layout.app')
@section('customer')
<div class="row">
        @php
            $i = 1;
        @endphp
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
                    <form action="{{ route('penumpang') }}" method="post">
                        @csrf
                       <input type="hidden" name="penumpang" id="" value="{{ $pass }}">
                       <input type="hidden" name="tanggal_pesan" id="" value="{{ $dateorder }}">
                       <input type="hidden" name="kategori" id="" value="{{ $category }}">
                       <input type="hidden" name="users_id" id="" value="{{ auth()->user()->id }}">
                       <input type="hidden" name="kereta_id" id="" value="{{ $p->kereta->id }}">
                       <input type="hidden" name="stasiun_kereta_id" id="" value="{{ $p->id }}">

                       
                       <!-- <input type="hidden" name=penumpang value="</? echo $_POST['penumpang'] ?>"> -->
                       <button type="submit">Pesan</button>
                     </form>
                    <!--<input type="hidden" name=tanggal value="</?php echo $_POST['tanggal'] ?>"> -->
                    <!-- <a href="pembelian.php?id=</? $kt["id_kereta"] ?>" class="btn btn-primary"><input type="hidden" name="pesan">Pesan</a> -->
                 </div>
              </div>
          
        </div>
        @endforeach
       
        
      </div>
@endsection