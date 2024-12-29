@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <p class="card-text"><strong>Price:</strong> {{ $product->price }} PLN</p>

                        <div class="d-flex justify-content-center align-items-center" style="width: 300px; height: 300px; border-radius: 5px; border: 1px solid #ddd;">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px; cursor: pointer;">
                            @else
                                <div style="width: 100%; height: 100%; background-color: #6c757d; color: #fff; display: flex; justify-content: center; align-items: center; border-radius: 5px;">
                                    <p class="text-center">No Image Available</p>
                                </div>
                            @endif
                        </div>

                        <div id="imageModal" class="modal">
                            <span class="close" id="closeModal">&times;</span>
                            <img class="modal-content" id="modalImage">
                            <div id="caption"></div>
                        </div>

                           
                        <p class="card-text mt-3"><strong>Description:</strong> {{ $product->desc }}</p>

                        
                        <div class="btn-group mr-2">
                            <a href="{{ route('products.index') }}">
                                <button class="btn btn-secondary">Back to Products</button>  <!-- przejscie do produktów -->
                            </a>
                        </div>
                        <div class="btn-group mr-2">    
                                @auth
                                    <form method="POST" action="{{ route('products.addToCart', $product->id) }}">
                                    @csrf
                                        <button type="submit" class="btn btn-success">Add to cart</button> <!-- dodanie to basket -->
                                    </form>
                                @else
                                    <p><a href="{{ route('login') }}">Sign in</a>, to add item to cart.</p>
                                @endauth

                        </div> 

                    </div>
                </div>
            </div>
        </div>
</div>

<script>
    // Pobierz elementy
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const captionText = document.getElementById('caption');
    const closeModal = document.getElementById('closeModal');

    // Dodaj funkcję otwierania modala po kliknięciu na obraz
    document.querySelectorAll('.product-image').forEach(image => {
        image.addEventListener('click', function() {
            modal.style.display = 'block';
            modalImg.src = this.src;
            captionText.innerHTML = this.alt || 'Image preview';
        });
    });

    // Zamknięcie modala
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Zamknięcie modala po kliknięciu w tło
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

@endsection