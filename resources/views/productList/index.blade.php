@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ __('Product list') }}</h5>
                    </div>
                        <table class="table table-striped table-hover mr-3">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Date of creation</th>
                                    <th scope="col">Date of update</th>                              
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>                                        
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td> 
                                     
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
