@extends('layouts.home')

@section('content')
    {{-- may delete the background --}}
    <section class="flex gap-16 p-2 mb-8 container h-[35rem] shadow-md bg-white">
        <div class="">
            <img class="w-[40rem]" src="/storage/{{ $productId->img }}">
        </div>
        <div class="flex flex-col w-full">
            {{-- product information --}}
            <div class="space-y-4">
                <h2 class="font-medium text-2xl break-words">{{ $productId->name }}</h2>
                <p class="text-stone-500 text-lg">{{ $productId->sold }}<span class="text-stone-400 text-base pl-2">Sold</span>
                </p>
            </div>


            {{-- product price and KG --}}
            <div class="mt-16">
                <h3 class="text-3xl text-red-500">SAR {{ $productId->price }} <span
                        class=" text-xl pl-4 text-stone-400">{{ $productId->description }} KG</span></h3>
            </div>

            {{-- product quantity --}}
            <div class="mt-16">
               <quantity-btn product-quantity='{{ $productId->quantity }}'></quantity-btn>
            </div>  

            {{-- Add to cart --}}
            <div class="mt-16">
                <addcart-btn user-id='{{ Auth::user()->id ?? 0 }}' product-id='{{ $productId->id }}'></addcart-btn>
            </div>
        </div>


    </section>
@endsection