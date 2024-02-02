@section('navbar')
<!--Navbar-->

<nav class="navbar navbar-expand-lg bg-white sticky-top shadow p-3 mb-5">
    <div class="container-sm">
      <img src="{{ asset('assets/images/Logo.jpg') }}">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link " aria-current="page" href="/home">Home</a>
          <!---<a class="nav-link" href="/order">Order</a> --->
        </div>
      </div>
    </div>
  </nav>

