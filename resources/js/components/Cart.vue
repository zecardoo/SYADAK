<template>
    <div class="">
        <a href="/checkout" class="relative">
            <i class="ri-shopping-cart-line text-gray-500 text-3xl"></i>

            <div v-if="itemCount != 0"
                class="w-5 h-5 rounded-full bg-red-600 text-white font-bold  flex justify-center items-center absolute bottom-5 left-5">
                {{ itemCount }}
            </div>
        </a>
    </div>
</template>
  
<script>
import axios from 'axios';

export default {
    data() {
        return {
            itemCount: '',
        };
    },

    mounted() {
        this.getDataFromCart();
        try {
            window.Echo.channel('channel-Cart')
                .listen('CartEvent', (event) => {
                    console.log('Broadcast received:', event.data);
                    this.itemCount = event.data;
                    // Handle the broadcasted data in your Vue component
                });

        } catch (error) {
            console.error('er----->', error);
        }

    },

    methods: {
        async getDataFromCart() {
            try {
                let response = await axios.get('/cart-show');
                console.log(response.data.data);

                this.itemCount = response.data.data;
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>
  