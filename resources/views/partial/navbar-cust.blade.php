<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="{{ asset('img/train-logo.png') }}" alt="kereta api" width="70px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/"><img class="rounded-circle" width="30px" height="30px"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pemesanan-tiket') }}">Tiket</a>
                </li>
            </ul>
            <ul class="navbar-nav">

                <form action="{{ route('logout') }}" method="post" class="nav-link justify-content">
                    @csrf
                    <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </ul>
        </div>
    </div>
</nav>