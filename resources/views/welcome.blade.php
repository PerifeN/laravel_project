@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- Nagłówek strony -->
    <div class="text-center mb-5">
        <h1 class="display-3">Welcome to Ski Shop</h1>
        <p class="lead">Your ultimate destination for ski gear and accessories.</p>
    </div>

    <!-- Sekcja "About Us" i "Explore" -->
    <div class="row justify-content-center mb-5">
        <!-- O nas -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header text-white bg-primary">
                    About Us
                </div>
                <div class="card-body">
                    <p>At Ski Shop, we specialize in offering premium ski equipment and expert advice for skiers of all levels. From beginners to professionals, we have everything you need to hit the slopes with confidence.</p>
                </div>
            </div>
        </div>

        <!-- Eksploruj stoki -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header text-white bg-secondary">
                    Explore the Slopes
                </div>
                <div class="card-body">
                    <p>Find the best skiing destinations, check the latest snow conditions, and join a vibrant community of ski enthusiasts. Start your next adventure with us!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sekcja "Nasze Marki" -->
    <div class="text-center mb-5">
        <h2 class="mb-4">Our Trusted Brands</h2>
        <div class="d-flex justify-content-center flex-wrap gap-4">
            <img src="{{ asset('images/brandLogos/atomic_logo.png') }}" alt="Atomic" class="m-4" style="max-width: 200px; height: auto;">
            <img src="{{ asset('images/brandLogos/fischer_logo.png') }}" alt="Fischer" class="m-4" style="max-width: 200px; height: auto;">
            <img src="{{ asset('images/brandLogos/dynastar_logo.png') }}" alt="Dynastar" class="m-4" style="max-width: 200px; height: auto;">
            <img src="{{ asset('images/brandLogos/nordica_logo.png') }}" alt="Nordica" class="m-4" style="max-width: 200px; height: auto;">
        </div>
    </div>

    <!-- Sekcja z obrazkami -->
    <div class="mb-5">
        <h2 class="text-center mb-4">Experience the Thrill of Skiing</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/photos/skiingphoto3.jpg') }}" alt="Skiing Adventure 1" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/photos/skiingphoto2.jpg') }}" alt="Skiing Adventure 2" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('images/photos/skiingphoto1.jpg') }}" alt="Skiing Adventure 3" class="img-fluid rounded shadow-sm">
            </div>
        </div>
    </div>

    <!-- Przycisk "Contact Us" -->
    <div class="text-center">
        <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
    </div>
</div>

@endsection
