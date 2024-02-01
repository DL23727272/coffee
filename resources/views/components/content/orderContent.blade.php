@section('order')
<!--Main Content-->
@include('components.modal.modal')
<div class="product">
    <section class="divs">
    <h1>Our Brewed Coffee Collections</h1>
    <p>Barista</p>
    <div class="row">
        <div class="cup">
            <img src="{{ asset('assets/images/iced.jpg') }}">
            <div class="layer">
                <a href="#"  data-bs-toggle="modal" data-bs-target="#coffee1"><h3>Caffe Latte</h3></a>
            </div>
        </div>

        <div class="cup">
            <img src="{{ asset('assets/images/iced.jpg') }}">
            <div class="layer">
                <a href="#"data-bs-toggle="modal" data-bs-target="#coffee2"><h3>Capuccino</h3></a>
            </div>
        </div>

        <div class="cup">
            <img src="{{ asset('assets/images/iced.jpg') }}">
            <div class="layer">
                <a href="#" data-bs-toggle="modal" data-bs-target="#coffee3"><h3>Spanish Latte</h3></a>
            </div>
        </div>
    </div>
</section>
</div>

<div class="product">
    <section class="divs">
    <h1>Our Espresso Coffee Collections</h1>
    <p>Barista</p>
    <div class="row">
        <div class="cup">
            <img src="{{ asset('assets/images/iced.jpg') }}">
            <div class="layer">
               <a href="#" data-bs-toggle="modal" data-bs-target="#coffee4"><h3>Americano</h3></a>
            </div>
        </div>

        <div class="cup">
            <img src="{{ asset('assets/images/iced.jpg') }}">
            <div class="layer">
              <a href="#" data-bs-toggle="modal" data-bs-target="#coffee5"><h3>Caramel Macchiato</h3></a>
            </div>
        </div>

        <div class="cup">
            <img src="{{ asset('assets/images/iced.jpg') }}">
            <div class="layer">
               <a href="#" data-bs-toggle="modal" data-bs-target="#coffee6"><h3>Signature Latte</h3></a>
            </div>
        </div>
    </div>
</section>
</div>
