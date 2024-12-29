@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="desc">Description:</label>
                            <textarea class="form-control" id="desc" name="desc" required>{{ $product->desc }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image">Product Image:</label>
                            @if($product->image)
                                <div class="mt-1">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Update Product</button>
                        <a href="{{ route('productList.index') }}" class="btn btn-secondary mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
