@extends('layout.app')
@section('customer')
<h1>Welcome {{ auth()->user()->first_name }}</h1>
        <form action="{{ route('postpemberhentian') }}" method="post">
            @csrf
            <div class="row mt-4">
                <div class="col">
                    <label>Berangkat</label><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-train"></i></span>
                        <select name="idberangkat"id="berangkat" class="form-select">
                            <option value="" selected>Berangkat</option>
                            <option value="" disabled>----</option>
                            @foreach ($stasiun as $s)
                              <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                            @endforeach
                       
                        </select>
                    </div>
                </div>
                <div class="col">
                <label>Tujuan</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-train"></i></span>
                        <select name="idtujuan" id="tujuan" class="form-select">
                            <option value="" selected>Tujuan</option>
                            <option value="" disabled>----</option>
                            @foreach ($stasiun as $s)
                            <option value="{{ $s->id }}">{{ $s->nama_stasiun }}</option>
                            @endforeach
                        </select>
                </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6">
                    <label for="tanggal">Tanggal</label><br>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                        <input type="date" name="tanggal_pesan" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Dewasa</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                
                                <select name="dewasa" id="" class="form-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Anak</label>
                            <br>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-person-breastfeeding"></i></span>
                                
                                <select name="anak" id="" class="form-select">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>
            
            <input type="hidden" name="id_users" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>

  
@endsection