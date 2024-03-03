<template>
    <!-- Logo -->
    <div class="flex items-center justify-between p-0">
        <div>
            <a href="#" class="flex items-center">
                <!-- <img class="w-16 rounded-full mix-blend-color-burn"
                    src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                    alt=""> -->
                <h2 class="text-red-400 font-bold uppercase text-3xl drop-shadow-xl">SYADAK</h2>
            </a>
        </div>

        <!-- btnMenu -->
        <div>
            <button @click="Menu = !Menu" class="self-end"> <i id="btnmenu" class="fa-solid fa-bars text-4xl"></i></button>

        </div>

    </div>

    <!-- about Syadak -->
    <div class="self-center">
        <ul v-if="Menu" class="space-y-8 text-lg text-gray-500 font-bold drop-shadow-xl w-full pt-4">
            <li class="hover:bg-slate-100 rounded-xl py-2 px-24 transition-all ease-in duration-300"><a href="#">Home</a>
            </li>
            <li class="hover:bg-slate-100 rounded-xl py-2 px-24 transition-all ease-in duration-300"><a
                    href="#">Category</a></li>
            <li class="hover:bg-slate-100 rounded-xl py-2 px-24 transition-all ease-in duration-300"><a href="#">About
                    us</a></li>
            <li class="hover:bg-slate-100 rounded-xl py-2 px-24 transition-all ease-in duration-300"><a href="#">Contact</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            Menu: false,
        }
    },
    mounted() {
    }
}
</script>
