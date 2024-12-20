@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ __('How do I know which size of skiing gear to order?') }}</div>
                <div class="card-body">
                We provide detailed sizing guides on every product page to help you choose the right size for skis, boots, and apparel. If you’re still unsure, contact our customer support team, and they’ll guide you based on your measurements and skill level.
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">{{ __('How long does delivery take?') }}</div>
                <div class="card-body">
                Delivery times vary depending on your location. Typically, orders within the same country are delivered in 3-5 business days, while international shipping may take 7-10 business days. You can track your order through the tracking link sent to your email.
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Can I return or exchange an item if it doesn’t fit or meet my expectations?') }}</div>
                <div class="card-body">
                Yes, we have a hassle-free return and exchange policy. Items can be returned within 30 days of delivery as long as they are unused and in their original packaging. 
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Do you offer any discounts or promotions?') }}</div>
                <div class="card-body">
                Yes, we frequently run seasonal promotions and offer discounts on select items. Follow us on social media to stay updated on the latest deals!
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Do you offer advice on choosing the right skiing gear') }}</div>
                <div class="card-body">
                Absolutely! Our team of skiing experts is here to help. Whether you’re looking for beginner-friendly skis or high-performance gear for advanced skiers, contact us via live chat or email, and we’ll assist you in making the best choice.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection