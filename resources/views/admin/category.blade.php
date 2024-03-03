@extends('layouts.admin')

@section('content')
    <section class="container mx-auto flex flex-col m-0  p-8 bg-slate-50 dark:bg-slate-800 ">

        <div>
            {{-- in js do the hide --}}
            <button id="btnAddCategory"
                class="bg-red-500 mb-4 py-3 px-16 text-white rounded-md text-xl font-semibold hover:opacity-75 hover:ease-in hover:duration-100"><span
                    class="pr-2"><i class="fa-solid fa-plus"></i></span>Add Category</button>
        </div>
        {{-- add new category --}}
        <form action="/category/p" class="hidden" id="frmAddCategory" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="flex flex-col">
                <div class="flex col-auto p-4  bg-white rounded-xl shadow-md dark:bg-slate-700">

                    {{-- col 1 --}}
                    <div class="space-y-8 w-1/2">

                        {{-- Product Name --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product Name</label>

                            <input id="name" class="text-lg w-[25rem]" type="text" autocomplete="off" name="name"
                                placeholder="Name" value="" required>
                        </div>

                        {{-- Product Description --}}
                        <div class="text-w space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product KG</label>

                            <input id="Description" class="text-lg w-[25rem]" type="number" min="0"
                                autocomplete="off" name="des" placeholder="KG" value="" required>

                        </div>

                        {{-- product Image --}}
                        <div class="space-y-3 drop-shadow-md">
                            <label class="text-lg font-semibold text-bleck dark:text-white">Product
                                Image</label>

                            <input class="" id="" type="file" accept="image/*, .pdf" name="img"
                                class="w-[25rem]">
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

        <section>
            <category-btn :category-data = '{{ json_encode($category) }}'></category-btn>
        </section>



        {{-- ------------------- End Of recent order ------------------- --}}
    </section>
@endsection
