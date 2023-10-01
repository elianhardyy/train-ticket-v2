@extends('layout.app')
@section('customer')
    <div class="row">
        @php
            $i = 1;
        @endphp
        @foreach ($pem as $p)
            <div class="col-md-4">
                <div class="card">
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
                            </div>
                            <div class="col">
                                <p>Tujuan</p>
                                <p>{{ $p->stasiunTo->nama_stasiun }}</p>
                                <p>{{ $p->jam_kereta_to }}</p>
                            </div>
                        </div>
                        <form action="/penumpang" method="POST">
                            @csrf
                            <input type="hidden" name="dewasa" value="{{ $pass }}">
                            <input type="hidden" name="anak" value="{{ $anak }}">
                            <input type="hidden" name="tanggal_pesan" value="{{ $dateorder }}">
                            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="kereta_id" value="{{ $p->kereta->id }}">
                            <input type="hidden" name="stasiun_kereta_id" value="{{ $p->id }}">
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection