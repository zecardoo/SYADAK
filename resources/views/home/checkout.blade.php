@extends('layouts.home')

@section('content')
    <section class="container mx-auto">
        {{-- @foreach ($products as $item)
        @endforeach --}}
        <checkout-btn :product-data='{{ json_encode($products) }}'></checkout-btn>

    </section>
@endsection
