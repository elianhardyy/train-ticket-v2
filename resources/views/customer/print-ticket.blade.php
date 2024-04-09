<link rel="stylesheet" href="{{ asset('css/print.css') }}">
<section class="row">
    
    @foreach ($pemesanan as $p)
    <div class="ticket">
		<div class="block">
			<div class="boarding">
				<h1>Boarding Pass</h1>
				<div class="till">
					<p>Boarding till</p>
					<span>Boards: {{ $p->penumpang->stasiunkereta->jam_kereta_from }}.</span>
					<span>Arrives: {{ $p->penumpang->stasiunkereta->jam_kereta_to }}.</span>
				</div>
			</div>
			<div class="content name">
				<h3>Name Of Passenger</h3>
				<p>{{ $p->username }}</p>
			</div>
			<div class="content from">
				<h3>From</h3>
				<p>{{ $p->penumpang->stasiunkereta->stasiunFrom->nama_stasiun }}</p>
			</div>
			<div class="content to">
				<div class="to-m">
					<h3>To</h3>
					<p>{{ $p->penumpang->stasiunkereta->stasiunTo->nama_stasiun }}</p>
				</div>

				<div class="airline">
					{{ $p->penumpang->kereta->nama_kereta }}
				</div>
			</div>
			<div class="scan">
				<img src="https://chart.googleapis.com/chart?cht=qr&chl=UA%201136%2098745-34538459&chs=180x180&choe=UTF-8&chld=L|2" alt="">
			</div>
		</div>

		<div class="section-2">
			<div class="gate">
				<h3>Gate</h3>
				<p>B3</p>
			</div>
			<div class="flight">
				<h3>Flight</h3>
				<p>2005</p>
			</div>
			<div class="seat">
				<h3>Seat</h3>
				<p>{{ $p->gerbong }}{{ $p->huruf_kursi }}</p>
			</div>
			<div class="group">
				<h3>Group</h3>
				<p>{{ $p->penumpang->kereta->kelas }}</p>
			</div>
		</div>

		<div class="left-side">
			<div class="airline">
				{{ $p->penumpang->kereta->nama_kereta }}
			</div>
			<div class="name">
				<h3>Name Of Passenger</h3>
				<p>{{ $p->username }}</p>
			</div>
			<div class="from">
				<h3>From</h3>
				<p>{{ $p->penumpang->stasiunkereta->stasiunFrom->nama_stasiun }}</p>
			</div>
			<div class="from">
				<div class="to-m">
					<h3>To</h3>
					<p>{{ $p->penumpang->stasiunkereta->stasiunTo->nama_stasiun }}</p>
				</div>
			</div>

			<div class="section-2">
				<div class="gate">
					<h3>Gate</h3>
					<p>B3</p>
				</div>
				<div class="flight">
					<h3>Flight</h3>
					<p>2005</p>
				</div>
				<div class="seat">
					<h3>Seat</h3>
					<p>{{ $p->gerbong }}{{ $p->huruf_kursi }}</p>
				</div>
				<div class="group">
					<h3>Group</h3>
					<p>{{ $p->penumpang->kereta->kelas }}</p>
				</div>
			</div>

			<div class="time">
				<p>Boarding till</p>
				<span>Boards: {{ $p->penumpang->stasiunkereta->jam_kereta_from }}</span>
				<span>Arrives: {{ $p->penumpang->stasiunkereta->jam_kereta_to }}</span>
			</div>
		</div>
	</div>
    <br>
    @endforeach

</section>
    