@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>
                    <div class="card-body">
                        @if(empty($cart))
                            <p class="m-3">Empty.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary m-3">Go to products</a>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sum</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $id => $item)
                                        <tr>
                                            <td>{{ $item['name'] }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('cart.decrease', $id) }}" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">-</button>
                                                </form>
                                                {{ $item['quantity'] }}
                                                <form method="POST" action="{{ route('cart.increase', $id) }}" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                                </form>
                                            </td>
                                            <td>{{ $item['price'] }} PLN</td>
                                            <td>{{ $item['quantity'] * $item['price'] }} PLN</td>
                                            <td>
                                                <form method="POST" action="{{ route('cart.remove', $id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <h5>Summary: <strong>{{ $total }} PLN</strong></h5>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('products.index') }}" class="btn btn-primary m-3">Go to products</a>
                            </div>

                            <div class="btn-group justify-content-end">
                            @if(!empty($cart) && count($cart) > 0)
                                <form action="{{ route('order.create') }}" method="GET">
                                    <button type="submit" class="btn btn-success">Proceed with order</button>
                                </form>
                            @endif
                            </div>    
                        @endif
                        @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
