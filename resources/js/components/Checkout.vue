<template>
    <div class="bg-gray-100 h-screen py-8">
        <div class="container mx-auto">
            <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <!-- here the for lope start -->
                    <div class="" v-for="products in productData">
                        <checkoutquantity-btn :product-id="products.id" :product-name="products.name"
                            :product-price="products.price" :product-quantity="products.pivot.quantity"
                            :quantity-max="products.quantity" :product-img = "products.img"></checkoutquantity-btn>
                    </div>
                </div>
                <div class="md:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span>Subtotal</span>
                            <span>SAR {{ Subtotal }}.00</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Taxes</span>
                            <span>$1.99</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Shipping</span>
                            <span>$0.00</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">SAR 0.00</span>
                        </div>
                        <payment-btn></payment-btn>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    inject: ["eventBus"],

    data() {
        return {
            Subtotal: 0,
        }
    },


    props: ['productData'],

    created() {
        this.Toatal()
    },

    methods: {
        Toatal() {
            this.Subtotal = 0; // Reset Subtotal before recalculating
            this.eventBus.on("TotalPrice", (total) => {
                this.Subtotal += total; // Assign the new total directly
                console.log('-------------> []', this.Subtotal);
            });
        },

    


    },

    mounted() {

    }



}
</script>
