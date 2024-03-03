@extends('layouts.home')

@section('content')
    {{-- Offer slider --}}
    <section class="swiper mySwiper h-[30rem] shadow-md bg-slate-50 drop-shadow-xl">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="w-full h-full"
                    src="https://img.freepik.com/free-vector/coming-soon-background-with-focus-light-effect-design_1017-27277.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">
            </div>

            <div class="swiper-slide">
                <img class="w-full h-full"
                    src="https://img.freepik.com/free-vector/coming-soon-text-abstract-sunrise-dark-background-with-motion-effect_157027-1073.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">
            </div>

            <div class="swiper-slide">
                <img class="w-full h-full"
                    src="https://img.freepik.com/free-vector/coming-soon-display-background-with-focus-light_1017-33741.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">
            </div>

        </div>
        {{-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> --}}
        <div class="swiper-pagination"></div>
    </section>

    {{-- About us intro --}}
    <section class=" my-8 p-4 w-[60rem] max-lg:container">
        <h2 class="text-red-400 font-bold  border-b-2 border-solid pb-4">Welcome!</h2>
        <div class="flex items-center justify-center">
            <div class="drop-shadow-md pb-12">
                <p class="text-justify text-base font-semibold text-gray-500">You can be confident when you're
                    shopping
                    online with SomStore. Our Secure online shopping website
                    encrypts your personal and financial information to ensure your order information is
                    protected.We
                    use industry standard 128-bit encryption. Our Secure online shopping website locks all critical
                    information passed from you to us, such as personal information, in an encrypted envelope,
                    making it
                    extremely difficult for this information to be intercepted.... <a href="#"
                        class="font-bold text-red-400 hover:translate-x-6 ease-in duration-300 flex w-48"><span
                            class="material-icons-sharp text-green-300">chevron_right</span>Read More</a></p>
            </div>

            <div class="mb-20 max-lg:hidden">
                <img class="w-[35rem] mix-blend-color-burn"
                    src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">

            </div>
        </div>
    </section>

    {{-- Products section --}}
    <section class="pb-4">
        <h2 class="text-center text-red-400 text-5xl font-semibold pb-8"><span class="text-black">Featured
            </span>Products</h2>

        <div class="h-full py-4 drop-shadow-xl flex flex-wrap justify-center gap-10">
            @foreach ($product as $item)
                {{-- <div
                    class="w-80 h-[35rem] ring-1 ring-gray-300 shadow-xl flex flex-col gap-8 rounded-2xl  break-words hover:ring-2 hover:ring-red-400 hover:ease-in-out hover:scale-95 hover:duration-300">
                    <img class="h-96 rounded-t-xl" src="/storage/{{ $item->img }}" alt="">
                    <h2 class="font-semibold text-3xl px-6">{{ $item->name }}</h2>
                    <h3 class="text-2xl font-bold px-6">SAR {{ $item->price }}.00 <span
                            class="text-gray-400 text-xl pl-9">{{ $item->des }}</span>
                    </h3>
                    <addcart-btn user-id='{{ Auth::user()->id ?? 0 }}' product-id='{{ $item->id }}'></addcart-btn> 

                </div> --}}

                <a href="/product-show/{{ $item->id }}">
                    <div
                        class="w-80 h-[35rem] ring-1 ring-gray-300 shadow-xl flex flex-col gap-8 rounded-2xl  break-words hover:ring-2 hover:ring-red-400 hover:ease-in-out hover:scale-95 hover:duration-300">
                        <img class="h-96 rounded-t-xl" src="/storage/{{ $item->img }}" alt="" loading="lazy">
                        <h2 class="font-semibold text-3xl px-6">{{ $item->name }}</h2>
                        <h3 class="text-2xl font-bold px-6">SAR {{ $item->price }}.00 <span
                                class="text-gray-400 text-xl pl-9">{{ $item->des }}</span>
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Deal section --}}
    {{-- <Section class="bg-slate-200 p-8">

    </Section> --}}
@endsection
