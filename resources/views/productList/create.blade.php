@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Add New Product</div>
                    <div class="card-body">

                        <!-- Wyświetlanie błędów walidacji -->
                        @if ($errors->any())
                            <div style="color: red;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formularz dodawania nowego użytkownika -->
                        <form action="{{ route('productList.storeProduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                                <br>

                                <label for="desc">Description:</label>
                                <input class="form-control" type="text" id="desc" name="desc" required>
                                <br>

                                <label for="price">Price:</label>
                                <input class="form-control" type="number" id="price" name="price" value="{{ old('price') }}" required>
                                <br>

                                <label for="image">Product Image:</label>
                                <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                <br>

                                <button class="btn btn-primary" type="submit">Add Product</button>
                                <button type="button" class="btn btn-warning">
                                    <a class="text-decoration-none" style="color: black;" href="{{ route('productList.index') }}">Go Back</a>
                                </button>
                            </div>
                        </form>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
