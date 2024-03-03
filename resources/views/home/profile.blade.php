@extends('layouts.home')

@section('content')
    {{-- see if u nedd the container --}}
    <section class="container">
        <div class="min-w-screen min-h-screen">
            <div class="flex items-center gap-4">
                <img src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" class="rounded-full w-12">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <div class="p-4">
                <profile-btn user-name='{{ Auth::user()->name }}' user-email='{{ Auth::user()->email }}'
                    user-id='{{ Auth::user()->id }}' :order-data='{{ json_encode($products) }}'></profile-btn>
            </div>

        </div>
    </section>
@endsection
