<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SYADAK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    {{-- logo website --}}
    <link rel="icon"
        href="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais" />
    {{-- Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    {{-- Font  Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">

    {{-- swiper --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- JS --}}

    <script src="{{ url('./JS/home.js') }}" defer></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    {{-- @include('loading') --}}
    <div id="app" class=" flex flex-col">

        <header class="">
            <nav class=" w-full py-2 px-24 shadow-md fixed  z-50 bg-gray-50">
                <div class="flex justify-between container  mx-auto">
                    {{-- info --}}
                    <div class="flex items-center gap-10 max-lg:hidden">
                        <div>
                            <a href="#" class="flex items-center">
                                {{-- <img class="w-16 rounded-full mix-blend-color-burn"
                                    src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                                    alt=""> --}}
                                <h2 class="text-red-400 font-bold uppercase text-3xl drop-shadow-xl">SYADAK</h2>
                            </a>
                        </div>

                        <ul id="ulMenu" class="flex text-lg text-gray-500 font-bold drop-shadow-xl">
                            <li class="hover:bg-slate-100 rounded-xl py-2 px-8 ease-in duration-300"><a
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="hover:bg-slate-100 rounded-xl py-2 px-8 ease-in duration-300"><a
                                    href="#">Category</a></li>
                            <li class="hover:bg-slate-100 rounded-xl py-2 px-8 ease-in duration-300"><a
                                    href="#">About us</a></li>
                            <li class="hover:bg-slate-100 rounded-xl py-2 px-8 ease-in duration-300"><a
                                    href="#">Contact</a></li>
                        </ul>
                    </div>

                    {{-- login --}}
                    <div class="flex gap-4 items-center drop-shadow-xl max-lg:hidden">

                        @if (Route::has('login'))
                            <div class="">
                                @auth

                                    <div class="flex items-center space-x-3">
                                        <a href="/profile" class="text-lg text-gray-500 font-bold">Hello,
                                            {{ Auth::user()->name }}</a>


                                        <a class="px-7 py-2 rounded-full bg-red-400" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                            <h3 class="text-lg font-bold text-white">Logout</h3>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="px-7 py-2 rounded-full bg-red-400 text-lg font-bold text-white">Log in</a>
                                @endauth
                            </div>
                        @endif

                        <div class="">
                            <cart-btn></cart-btn>
                        </div>
                    </div>

                    {{-- menu --}}
                </div>
                <div class="lg:hidden flex flex-col">
                    {{-- <button id="btnMenu" type="submit"> <i class="fa-solid fa-bars text-4xl"></i></button> --}}
                    <menu-btn></menu-btn>
                    {{-- <i class="ri-shopping-cart-line text-gray-500 text-3xl"></i> --}}
                </div>

                {{-- Notification --}}
                <div>
                    <notification-alart></notification-alart>
                </div>
            </nav>
        </header>


        <main class="pt-20 px-0 max-lg:px-4 container mx-auto ">
            @yield('content')
        </main>


        



        <footer class="bg-gray-800">
            {{-- info SYADAK --}}
            <div class="container mx-auto">
                <section class="flex flex-col gap-10 px-4 lg:grid grid-cols-footer lg:gap-48 p-4 lg:px-32">
                    {{-- about us --}}
                    <div class="p-4">
                        <h2 class="text-gray-200 font-bold border-b-2 border-solid uppercase">About US</h2>
                        <div class="pt-4">
                            <img class="w-32 rounded-full mix-blend-color-burn float-left"
                                src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                                alt="">

                            <p class="text-[white] text-justify">You can be confident when you're shopping
                                online with SomStore. Our Secure online shopping website
                                encrypts your personal and financial information to ensure your order information is
                                protected.We
                                use
                                industry standard 128-bit encryption. Our Secure online shopping website locks all
                                critical
                                information
                                passed from you to us, such as personal information, in an encrypted envelope, making it
                                extremely
                                difficult for this information to be intercepted..
                            </p>
                        </div>
                    </div>

                    {{-- Social Media --}}
                    <div class="p-4">
                        <h2 class="text-gray-200 font-bold border-b-2 border-solid uppercase">Social Media</h2>

                        <ul class="flex flex-col gap-8  pt-4">
                            <a href="#" class="text-4xl text-white flex gap-4 opacity-50 hover:opacity-100"><i
                                    class="fa-brands fa-facebook text-5xl text-white"></i>Facebook</a>
                            <a href="#" class="text-4xl text-white flex gap-4 opacity-50 hover:opacity-100"><i
                                    class="fa-brands fa-instagram text-5xl text-white"></i>Instagram</a>
                            <a href="#" class="text-4xl text-white flex gap-4 opacity-50 hover:opacity-100"><i
                                    class="ri-twitter-line text-5xl text-white"></i>Twitter</a>


                        </ul>
                    </div>

                    {{-- About syadak --}}
                    <div class="p-4">
                        <h2 class="text-gray-200 font-bold border-b-2 border-solid uppercase">About syadak</h2>
                        <ul class="flex flex-col gap-4 text-4xl text-white pt-4">
                            <a href="#" class="opacity-50 hover:opacity-100">
                                <li>About Us</li>
                            </a>
                            <a href="#" class="opacity-50 hover:opacity-100">
                                <li>Contact Us</li>
                            </a>
                            <a href="#" class="opacity-50 hover:opacity-100">
                                <li>Home</li>
                            </a>


                        </ul>
                    </div>
                </section>
            </div>

            {{-- Copy Right --}}
            <section class=" bg-gray-900 text-[#737373] flex flex-col gap-4 p-4 px-32">
                <div class="container mx-auto">
                    <p>&copy; SYDAK.com Groups</p>
                    <p class="max-lg:hidden"> Copyright © 2021 SYDAK.com All rights reserved. The information contained
                        in
                        SomStore.com may not be
                        published, broadcast, rewritten, or redistributed without the prior written</p>
                    <p class="max-lg:hidden"> authority of SYDAK.com</p>
                </div>
            </section>
        </footer>
    </div>
</body>

</html>
