@extends('layout.app')
@section('customer')
<div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">

            <!--Train Details-->
              <div id='printReceipt' class="invoice">
                <div class="row invoice-header">
                  <div class="col-sm-7">
                    <div class="invoice-logo"></div>
                  </div>
                  <div class="col-sm-5 invoice-order"><span class="invoice-id">Train Ticket For</span><span class="incoice-date">Depan Belakang </span></div>
                </div>
                <div class="row invoice-data">
                  <div class="col-sm-5 invoice-person"><span class="name">Depan Belakang</span><span>{{ auth()->user()->email }} - {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></div>
                  <div class="col-sm-2 invoice-payment-direction"></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-bordered" >
                    <thead>
                      <tr>
                        <th>Train Number</th>
                        <th>Train</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Dep.Time</th>
                        <th>Fare</th>
                        <th>Fare</th>
                        <th>Fare</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $harga = 0;
                      @endphp
                       @foreach ($pemesanan as $p)
                       @if ($p->status == 'belum')
                       <tr>
                         <td>{{ $p->penumpang->kereta->nama_kereta }}</td>
                         <td>{{ number_format($p->harga) }}</td>
                         <td>{{ $p->penumpang->stasiunkereta->stasiunFrom->nama_stasiun }}</td>
                         <td>{{ $p->penumpang->stasiunkereta->stasiunTo->nama_stasiun }}</td>
                         <td>{{ $p->user->first_name }}</td>
                         <td>{{ $p->penumpang->stasiunkereta->jam_kereta_from }}</td>
                         <td>{{ $p->penumpang->stasiunkereta->jam_kereta_to }}</td>
                         <td>{{ $p->penumpang->tanggal_pesan }}</td>
                       </tr>
                        @php
                          $harga+= $p->harga
                        @endphp 
                       @endif
                       @endforeach
                      <hr>
                    </tbody>
                    </table>
                    <h4>Rp {{ number_format($harga) }}</h4>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row invoice-footer">
                  <div class="col-lg-12">
                    <form action="/print" method="get" target="_blank">
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <button id="print" class="btn btn-lg btn-space btn-primary">Print</button>
                    </form>
                    <a href="print" target="blank">Print</a>
                  </div>
                  <div class="col-md-3">
                      <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                        <button class="btn btn-secondary">Bayar</button>
                      </form>
                  </div>
              </div>
              
            </div>
          </div>
        </div>
@endsection