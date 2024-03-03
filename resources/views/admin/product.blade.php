@extends('layouts.admin')
@section('content')
    <section class="container mx-auto flex flex-col  p-8 bg-slate-50 dark:bg-slate-800">

        <div>
            <button id="btnAddProduct"
                class="bg-red-500 mb-4 py-3 px-16 text-white rounded-md text-xl font-semibold hover:opacity-75 hover:ease-in hover:duration-100"><span
                    class="pr-2"><i class="fa-solid fa-plus"></i></span>Add Product</button>
        </div>

        <form class="hidden" id="frmAddProduct" action="{{ route('product.store') }}" enctype="multipart/form-data"
            method="POST">
            @csrf

            <div class="flex flex-col">
                <div class="grid grid-cols-2 p-4  bg-white rounded-xl shadow-md dark:bg-slate-700">

                    {{-- col 1 --}}
                    <div class="space-y-8 w-1/2">

                        {{-- Product Name --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product Name</label>

                            <input id="name" class="text-lg w-[25rem]" type="text" autocomplete="off" name="name"
                                placeholder="Name" value="" required>
                        </div>

                        {{-- Product Description --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product KG</label>

                            <input id="Description" class="text-lg w-[25rem]" type="number" min="0"
                                autocomplete="off" name="description" placeholder="KG" value="" required>

                        </div>


                        {{-- Product Price --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product Price</label>

                            <input id="" class="text-lg w-[25rem]" type="number" min="0" autocomplete="off"
                                name="price" placeholder="Price" value="" required>
                        </div>

                        {{-- Product quantity --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product
                                quantity</label>

                            <input id="" class="text-lg w-[25rem]" type="number" min="0" autocomplete="off"
                                name="quantity" placeholder="quantity" value="" required>
                        </div>


                    </div>

                    {{-- col 2 --}}
                    <div class="space-y-8 w-1/2">

                        {{-- product Image --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product
                                Image</label>

                            <input class="" id="" type="file" accept="image/*, .pdf" name="img"
                                class="w-[25rem]" required>
                        </div>

                        {{-- product category --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product
                                Category</label>

                            <div
                                class="relative group rounded-lg w-[18rem] bg-gray-50 overflow-hidden before:absolute before:w-12 before:h-12 before:content[''] before:right-0  before:rounded-full before:blur-lg ">

                                <svg y="0" xmlns="http://www.w3.org/2000/svg" x="0" width="100" viewBox="0 0 100 100"
                                    preserveAspectRatio="xMidYMid meet" height="100"
                                    class="w-8 h-8 absolute right-0 -rotate-45 stroke-gray-500 top-1.5 group-hover:rotate-0 duration-300">
                                    <path stroke-width="4" stroke-linejoin="round" stroke-linecap="round" fill="none"
                                        d="M60.7,53.6,50,64.3m0,0L39.3,53.6M50,64.3V35.7m0,46.4A32.1,32.1,0,1,1,82.1,50,32.1,32.1,0,0,1,50,82.1Z"
                                        class="svg-stroke-primary"></path>
                                </svg>

                                {{-- product category --}}

                                <select class="text-base w-full p-2.5" name="category_id" required>
                                    <option value="" selected>Choose Category </option>
                                    @foreach ($category as $item)
                                        <option class="" value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>



                </div>
                <div class=" p-4  w-48 self-end">
                    <button type="submit"
                        class="flex justify-center items-center gap-2 p-3 rounded-md text-2xl text-white font-bold bg-green-400 drop-shadow-lg  w-full hover:opacity-50 transition-all ease-in-out duration-300"><i
                            class="fa-regular fa-floppy-disk"></i> Save</button>
                </div>
            </div>

        </form>

        {{-- Table --}}
        <section class="">
            <product-btn :product-data='{{ json_encode($product) }}'
                :seller-data='{{ json_encode($seller) }}' :category-data='{{ json_encode($category) }}'></product-btn>
        </section>

    </section>
@endsection
