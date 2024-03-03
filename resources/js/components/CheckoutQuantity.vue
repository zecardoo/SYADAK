<template>
    <table class="w-full bg-white rounded-lg shadow-md p-6 mb-4 border-separate">
        <thead>
            <tr>
                <th class="text-left font-semibold">Product</th>
                <th class="text-left font-semibold">Price</th>
                <th class="text-center font-semibold">Quantity</th>
                <th class="text-center font-semibold">Total</th>
                <th class="text-center font-semibold">Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="">
                    <div class="flex items-center w-[12rem]">

                        <img class="h-16 w-16 mr-4" :src="`/storage/${img}`" alt="Product image" loading="lazy">
                        <span class="font-semibold break-words w-[13rem]">{{ name }}</span>
                    </div>
                </td>
                <td class="">SAR {{ price }}.00</td>
                <td class="w-0">
                    <div class="flex items-center gap-8">
                        <div class="flex items-center border border-solid border-stone-200 px-3  rounded-md">

                            <button @click="decrement" :disabled="quantity === 1"
                                class="text-stone-500 text-lg pr-4 disabled:cursor-not-allowed">
                                <i class="fas fa-minus"></i>
                            </button>

                            <input type="number" v-model.number="quantity" :max="maxQuantity" min="1"
                                @input="updateQuantity"
                                class="quantity-input rounded-none border-x-[1px] border-solid border-stone-200 shadow-none text-center p-0 w-[3rem]" readonly  />

                            <button @click="increment" :disabled="quantity === maxQuantity"
                                class="text-stone-500 text-lg pl-4 disabled:cursor-not-allowed">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="text-center text-slate-500">SAR {{ totalPrice() }}.00</td>
                <td class="text-center font-semibold text-red-600">Delete</td>
                <!-- <div v-for="(item, index) in Total">SAR {{ item }}.00</div> -->
            </tr>

            <!-- More product rows -->
        </tbody>
    </table>
</template>
<script>
import axios from 'axios';

export default {
    inject: ["eventBus"],

    data() {
        return {
            name: this.productName,
            price: this.productPrice,
            quantity: this.productQuantity,
            maxQuantity: this.quantityMax,
            img: this.productImg,
            totalprice: 0,
            total: 0,
        }
    },


    props: ['productName', 'productPrice', 'productQuantity', 'quantityMax', 'productId', 'productImg'],

    created() {
        this.sendData();
    },
    methods: {
       
        totalPrice() {
            return this.quantity * this.price;
        },

        async increment() {
            if (this.quantity < this.maxQuantity) {
                this.quantity += 1;
            }
            this.total =  this.price;
            this.eventBus.emit("TotalPrice", this.total);

            try {
                // await come with async added before the methotd start
                let response = await axios.post('/cart-creat', {
                    'product_id': this.productId,
                    'Quantity': 1,

                });

            } catch (error) {
                console.error(error);
            }
        },

        async decrement() {
            if (this.quantity > 1) {
                this.quantity -= 1;

            }
            this.total = -this.price;
            this.eventBus.emit("TotalPrice", this.total);
           
            try {
                // await come with async added before the methotd start
                let response = await axios.post('/cart-creat', {
                    'product_id': this.productId,
                    'Quantity': -1,

                });


            } catch (error) {
                console.error(error);
            }
        },

        sendData(){
            this.total = this.quantity * this.price;
            this.eventBus.emit("TotalPrice", this.total);
        },
        
    },


    mounted() {
        // console.log('Product Data ------> ', this.products);

        // this.eventBus.on("quantitydata", (quantity) => {
        //     this.Quantity = quantity;
        //     console.log('Quantity:', this.Quantity);
        // });

        // for (let products of this.productData) {
        // // console.log('Product Data ------> ', product.name);
        //    this.Total = products.price * products.pivot.quantity;
        //     console.log('Product total price ------> ', this.Total);


        // }

    },
}
</script>
<style scoped>
/* Add your styles here */

.quantity-input::-webkit-inner-spin-button,
.quantity-input::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>