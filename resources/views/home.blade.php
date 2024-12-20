@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body m-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are successfully logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 ">
        <div class="row justify-content-md-center">
            <div class="col-6 col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Go to welcome site</h5>
                        <p class="card-text">
                            <a href="/">
                                <button class="btn btn-primary">Welcome site</button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Go to product site</h5>
                        <p class="card-text">
                            <a href="/products">    
                                <button class="btn btn-primary">Product site</button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div style="margin-top: 50px;"></div>
</div>
@endsection
