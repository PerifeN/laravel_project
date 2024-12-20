@extends('layouts.app')

@section('content')
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
            <form action="{{ route('contact.send') }}" method="POST" style="max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); font-family: Arial, sans-serif;">
            @csrf
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Contact Us</h2>
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Name</label>
                <input type="text" name="name" id="name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Email</label>
                <input type="email" name="email" id="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="message" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Message</label>
                <textarea name="message" id="message" rows="4" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px;"></textarea>
            </div>
            <button type="submit" style="display: block; width: 100%; background: #007BFF; color: white; padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color 0.3s;">
                Send Message
            </button>
        </form>

        
        @if(session('success'))
            <div style="
                max-width: 600px; 
                margin: 20px auto; 
                padding: 15px; 
                background: #d4edda; 
                border: 1px solid #c3e6cb; 
                border-radius: 10px; 
                color: #155724; 
                font-weight: bold; 
                font-size: 16px; 
                text-align: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                display: flex; 
                align-items: center; 
                justify-content: center;
            ">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; margin-right: 5px; fill: #155724; vertical-align: middle;" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.904 8.803l2.496 2.497a.5.5 0 0 0 .707 0l4.096-4.096a.5.5 0 0 0-.707-.707L8.5 10.086 6.611 8.197a.5.5 0 1 0-.707.707z"/>
                </svg>
                <span style="line-height: 1;">{{ session('success') }}</span>
            </div>
        @endif


        @if($errors->any())
            <div style="max-width: 600px; margin: 20px auto; text-align: center; color: #dc3545; font-weight: bold;">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

</body>
</html>

@endsection