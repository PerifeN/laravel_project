@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ ('Submit your order') }}</h5>
                </div>
                <div class="card-body">

                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Name and Surname</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
                            </div>
                    
                            <h3>Products:</h3>
                            <ul class="list-group mb-3">
                                @foreach($cart as $id => $details)
                                    <li class="list-group-item">
                                        {{ $details['name'] }} - {{ $details['quantity'] }} x {{ $details['price'] }} PLN
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-3">
                                <h5>Summary: <strong>{{ $total }} PLN</strong></h5>
                            </div>

                            <div class="btn-group">
                            <button type="submit" class="btn btn-success">Complete your order</button>
                            </div>
                            
                        </form>
                            <div class="mt-3">
                                <a href="{{ route('cart.view') }}" class="btn btn-danger">Go back to cart</a>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
