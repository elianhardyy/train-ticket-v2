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
                       @foreach ($checkout as $p)
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
                  <div class="col-md-3">
                   
                      <button class="btn btn-secondary" id="pay-button">Bayar</button>
                   
                  </div>
              </div>
              
            </div>
          </div>
        </div>
@endsection
@push('js_scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script>
@endpush
