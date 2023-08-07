@extends('layout.app')
@section('customer')
<h1>Welcome {{ auth()->user()->name }}</h1>
        <form action="{{ route('postpemberhentian') }}" method="post">
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
            <div class="row">
                <div class="col-md-6">
                    <label for="penumpang">Jumlah Penumpang</label><br>
                    <input type="number" name="penumpang" class="form-control" id="penumpang">
                </div>
                <div class="col-md-6">
                    <label for="tanggal">Tanggal</label><br>
                    <input type="date" name="tanggal_pesan" class="form-control">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="kategori">Kategori</label><br>
                    <select class="form-select category" aria-label="Default select example" name="kategori">
                    <option selected>----- Pilih Jenis Penumpang -----</option>
                    <option value="A">Anak</option>
                    <option value="D">Dewasa</option>
                </select>
                </div>
            </div>
            <br>
            <h1>ipois</h1>
            <input type="hidden" name="id_users" value="{{ auth()->user()->id }}">
            <button name="pesan" class="btn btn-primary">Pesan</button>
        </form>

  <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection