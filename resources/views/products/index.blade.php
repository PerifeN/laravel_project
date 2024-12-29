@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-3 m-3 mx-auto">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <div class="d-flex justify-content-center align-items-center mx-auto" style="width: 70px; height: 70px; border: 2px solid #333;">
                                                    @if($product->image)
                                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 70px; height: 70px; object-fit: cover;">
                                                    @else
                                                        <span>No Image</span>
                                                    @endif
                                                </div>
                                                <p class="card-text">Price: {{ $product->price }} PLN</p>
                                                @auth
                                                    <form method="POST" action="{{ route('products.addToCart', $product->id) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success mb-2">Add to cart</button>
                                                    </form>
                                                @else
                                                    <p><a href="{{ route('login') }}">Sign in</a>, to add item to cart.</p>
                                                @endauth
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">More Information</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>



                            <div class="d-flex justify-content-center">
                                {{ $products->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

