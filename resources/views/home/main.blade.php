@extends('layouts.home')

@section('content')
    {{-- Offer slider --}}
    <section class="swiper mySwiper h-[30rem] shadow-md bg-slate-50 drop-shadow-xl">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="w-full h-full"
                    src="https://img.freepik.com/free-vector/coming-soon-background-with-focus-liflex flex-col gap-8t-effect-design_1017-27277.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">
            </div>

            <div class="swiper-slide">
                <img class="w-full h-full"
                    src="https://img.freepik.com/free-vector/coming-soon-text-abstract-sunrise-dark-background-with-motion-effect_157027-1073.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">
            </div>

            <div class="swiper-slide">
                <img class="w-full h-full"
                    src="https://img.freepik.com/free-vector/coming-soon-display-background-with-focus-liflex flex-col gap-8t_1017-33741.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
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
                            class="material-icons-sharp text-green-300"></span>Read More</a>
                </p>
            </div>

            <div class="mb-20 max-lg:hidden">
                <img class="w-[35rem] mix-blend-color-burn"
                    src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt="" loading="lazy">

            </div>
        </div>
    </section>

    {{-- Products section --}}
    <section class="mb-4">
        <h2 class="text-center text-red-400 text-5xl font-semibold pb-8"><span class="text-black">Featured
            </span>Products</h2>

        <div class="h-full py-4 drop-shadow-xl flex justify-center 2xl:grid 2xl:grid-cols-5 flex-wrap gap-10">
            @foreach ($product as $item)
                <a href="/product-show/{{ $item->id }}">
                    <div
                        class="w-72  ring-1 ring-gray-300 shadow-md flex flex-col gap-8 rounded-2xl  break-words hover:ring-2 hover:ring-red-400 hover:ease-in-out hover:scale-95 hover:duration-300">

                        <img class="h-[20rem] rounded-t-xl" src="/storage/{{ $item->img }}" alt=""
                            loading="lazy">

                        <div class="pb-4 space-y-4">
                            <h2 class="font-semibold text-3xl px-6">{{ $item->name }}</h2>
                            <div class="flex items-center text-base">
                                <h3 class="text-2xl font-bold px-6 text-red-500">SAR {{ $item->price }}.00</h3>
                                <h4 class="text-gray-400 text-xl pl-9">{{ $item->description }} KG</h4>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>


    {{-- Contact us --}}
    <section class="flex flex-col items-center pt-12 mb-8">
        <h2 class="text-center text-black text-5xl font-semibold uppercase pb-8"><span class="text-red-400">contact
            </span>us</h2>

        <form action="/contact/p" method="POST" class="flex gap-8 w-full">
            @csrf
            <div class="p-4 border-[1px] border-gray-400 border-solid rounded-md shadow-md w-2/3">
                <h3 class="text-4xl uppercase pb-8">get in touch</h3>

                <div class="grid grid-cols-2 gap-8">
                    {{-- name --}}
                    <input class="p-4 placeholder:text-2xl placeholder:text-gray-500 font-thin text-2xl text-gray-500"
                        type="text" placeholder="Your name"  name="name" required >
                    {{-- email --}}
                    <input class="p-4 placeholder:text-2xl placeholder:text-gray-500 font-thin text-2xl text-gray-500"
                        type="email" placeholder="Your email" name="email" required>

                    {{-- number --}}
                    <input class="p-4 placeholder:text-2xl placeholder:text-gray-500 font-thin text-2xl text-gray-500"
                        type="tel" pattern="[0-9]{10}" size="10" maxlength="10" placeholder="050-584-2259" name="number" required>

                    {{-- subject --}}
                    <input class="p-4 placeholder:text-2xl placeholder:text-gray-500 font-thin text-2xl text-gray-500"
                        type="text" placeholder="Your subject" name="subject" required>

                </div>

                <div class="grid pt-4">
                    <textarea class="p-4 placeholder:text-2xl placeholder:text-gray-500 font-thin text-2xl text-gray-500"
                        placeholder="Your message..." name="message" cols="30" rows="10" required></textarea>
                </div>

                <button class="text-white text-xl bg-red-400 py-2 px-20 rounded-md mt-8">Send Message</button>

            </div>

            <div class="p-4 border-[1px] border-gray-400 border-solid rounded-md shadow-md w-full">
                <iframe class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.2242286743694!2d101.70477421408958!3d3.0344264546950246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdcaaab261d805%3A0x404f0a7303b4be92!2sEast%20Lake%20Residence%2C%20Taman%20Serdang%20Perdana%2C%2043300%20Seri%20Kembangan%2C%20Selangor!5e0!3m2!1sen!2smy!4v1653985382933!5m2!1sen!2smy"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>


        </form>



    </section>

    {{-- Deal section --}}
    {{-- <Section class="bg-slate-200 p-8">

    </Section> --}}
@endsection
