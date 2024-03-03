<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SAYDAK') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font  Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">

    {{-- Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    {{-- <link rel="stylesheet" href="CSS/admin.css"> --}}
    {{-- <link rel="stylesheet" href="CSS/category.css"> --}}

    {{-- <script src="./admin.js"></script> --}}
    <script src="{{ url('./JS/admin.js') }}" defer></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body id="app" class=" grid grid-cols-laptop bg-slate-50">

    {{-- <nav></nav> --}}
    <header class="bg-red-300">
        <aside class="fixed bg-red-500 w-[15rem] h-full space-y-6  shadow-xl">
            <section class=" flex items-center justify-between">
                <div class=" flex gap-3 items-center mt-4 ml-2">
                    <img class=" w-10 h-10 rounded-full"
                        src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                        alt="">
                    <h2 class="text-white font-semibold"><span class=" text-red-300 font-semibold">SYA</span>DAK</h2>
                </div>

                <div class=" hidden" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </section>

            {{-- add vue.js --}}
            <section class=" flex flex-col">
                <ul class="">
                    <li class="last-child ">
                        <a href="{{ route('dashborad') }}" id="btnDashborad"
                            class="sidera {{ $active_dashborad ?? '' }}">
                            <i class="fa-solid fa-gauge icon"></i>
                            <h3>Dashborad</h3>
                        </a>
                    </li>
                    <li class="last-child">
                        <a href="{{ route('users') }}" id="btnCustomer" class="sidera {{ $active_users ?? '' }}">
                            <i class="ri-user-3-line icon"></i>
                            <h3>Users</h3>
                        </a>
                    </li>
                    <li class="last-child">
                        <a href="{{ route('category') }}" id="btnCategory" class="sidera {{ $active_category ?? '' }}">
                            <i class="fa-solid fa-list icon"></i>
                            <h3>Category</h3>
                        </a>
                    </li>
                    <li class="last-child">
                        <a href="#" id="btnOrder" class="sidera {{ $active_orders ?? '' }}">
                            <i class="fa-solid fa-receipt icon"></i>
                            <h3>Orders</h3>
                        </a>
                    </li>
                    <li class="last-child">
                        <a href="#" id="btnMessages" class="sidera {{ $active_messages ?? '' }}">
                            <i class="fa-solid fa-envelope icon"></i>
                            <h3>Messages</h3>
                        </a>
                    </li>
                    <li class="last-child">
                        <a href="{{ route('product') }}" id="btnProduct" class="sidera {{ $active_product ?? '' }}">
                            <i class="fa-brands fa-product-hunt icon"></i>
                            <h3>Product</h3>
                        </a>
                    </li>
                    <li class="last-child ">

                        <a class="sidera" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </section>
        </aside>
    </header>

    <main class="grid grid-rows-navbar">
        <nav class="bg-slate-50 flex items-center  gap-6 drop-shadow-md shadow-md">
            {{-- menu button --}}
            <div class=" hidden">
                <button class="">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>

            {{-- Theme --}}
            {{-- <div
                class="theme-toggler bg-white flex justify-between items-center cursor-pointer rounded-full h-8 w-16  mt-1">
                <span class="material-icons-sharp">dark_mode</span>
                <span class="material-icons-sharp light_mode">light_mode</span>
            </div> --}}

            {{-- profile  need more update --}}
            <div class="">
                <a href="" class="flex flex-nowrap  items-center gap-4  p-2">
                    <div>

                        <img class=" w-12 h-12 rounded-full"
                            src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                            alt="profile-image">

                    </div>

                    <div class="break-words ">
                        <b class="uppercase text-xl">{{ Auth::user()->name }}</b>
                    </div>
                </a>
            </div>
        </nav>

        {{-- Classes in admin folder --}}
        <div>
            @yield('content')
        </div>
    </main>
</body>

</html>
