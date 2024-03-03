<template>
    <div class="">
        <button @click="AddToCart()"
            class="bg-red-500 text-xl text-white text-center font-semibold px-16 py-2 rounded-md hover:opacity-50 hover:ease-in-out hover:duration-300"><span><i
                    class="fa-solid fa-cart-plus pr-4"></i></span>Add Cart</button>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    inject: ["eventBus"],


    data() {
        return {
            Quantity: 1,
        }
    },


    props: ['userId', 'productId'],

    methods: {

        async AddToCart() {
            // check if the user logged in

            if (this.userId == 0) {

                //notification
                this.$notify({
                    group: 'auth',
                    text: 'You need to login, To add this product in Cart',
                    type: 'error'
                });
                return;
            }


            // if the user already Log-in

            try {
                // await come with async added before the methotd start
                let response = await axios.post('/cart-creat', {
                    'product_id': this.productId,
                    'Quantity': this.Quantity,

                });

                // message come from the route /cart-creat
                console.log('Success ', response.data.message);


                this.$notify({
                    group: 'Cart-add',
                    text: 'item added successfully',
                    type: 'success'
                });

            } catch (error) {
                console.error(error);

                this.$notify({
                    group: 'Cart-add',
                    text: 'Failed to add item to cart. Please try again.',
                    type: 'error'
                });
            }

            //the below example can be used without async

            // axios.post('/cart-creat', { 'product_id': this.productId }).then(response => {
            //     console.log(response.data.message);

            // }).catch(error => {
            //     console.error(error);

            // })


        }

        
    },


    mounted() {
        this.eventBus.on("quantity", (quantity) => {
                this.Quantity = quantity;
                console.log('-------------> []', this.Quantity)            })
    },
}
</script>