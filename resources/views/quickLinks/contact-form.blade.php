@extends('layouts.app')

@section('content')
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('contact.send') }}" method="POST" class="card p-4 shadow-lg">
            @csrf
            <h2 class="text-center mb-4">Contact Us</h2>

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <!-- Message Field -->
            <div class="mb-3">
                <label for="message" class="form-label fw-bold">Message</label>
                <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 fw-bold">Send Message</button>
        </form>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mt-4 text-center d-flex align-items-center justify-content-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
@endsection
