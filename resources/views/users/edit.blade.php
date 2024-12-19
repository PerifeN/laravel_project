@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Currently editing: {{ $user->name }} ({{ $user->email }})</div>
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

                            <!-- Formularz edycji -->
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    <br>
                                    <label for="surname">Surname:</label>
                                    <input class="form-control" type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}" required>
                                    <br>
                                    <label for="email">Email:</label><br>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    <br>
                                    <label for="role">Role:</label><br>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                                    </select>
                                    <br><br>
    
                                    <button class="btn btn-primary" type="submit">Save changes</button>

                                    <button type="button" class="btn btn-warning">
                                        <a class="text-decoration-none" style="color: black;" href="{{ route('users.index') }}">Go Back</a>
                                    </button>
                                </div>
                            </form> 
                            
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection