<template>
    <div class="flex gap-8 ">
        <div class=" flex flex-col w-[12rem] p-4">

            <!-- profile  -->
            <button class="ring-1 rounded-md p-4 mb-4" :class="{ 'text-red-500 ring-red-500': profileActive }"
                @click="profile">
                Profile
            </button>

            <!-- Order -->
            <button class="ring-1 rounded-md p-4 mb-4" :class="{ 'text-red-500 ring-red-500': orderActive }" @click="Order">
                Order
            </button>

        </div>

        <!-- profile  -->
        <div v-if="profileActive" class="w-full bg-white rounded-md p-5">
            <div class="border-b-[1px] border-solid border-stone-200 pb-4">
                <h2>My Profile</h2>
            </div>

            <form @submit.prevent="submitProfile" class="grid grid-cols-2 items-center  py-8 px-14">
                <div class="space-y-12 text-base">
                    <label for="" class="flex items-center gap-4">
                        <span class="text-stone-400">Name</span>
                        <input type="text" v-model="name" required>
                    </label>
                    <label for="" class="flex items-center gap-4">
                        <span class="text-stone-400">Email</span>
                        <p>{{ email }}</p>
                    </label>

                    <button type="submit" class="text-white bg-red-400 py-2 px-6 rounded-md hover:opacity-90">Save</button>

                </div>
                <!-- later add pic -->
                <div class="flex flex-col items-center gap-5 border-l-[1px] border-solid border-stone-300 ">
                    <div class="">
                        <img src="https://img.freepik.com/premium-vector/fish-sushi-circle-shape-japanese-food-sign-logo-design-food-restaurant_198454-39.jpg?size=626&ext=jpg&ga=GA1.1.1853597733.1703178981&semt=ais"
                            alt="" class="rounded-full w-32 ring-1" loading="lazy">
                    </div>
                    <div>
                        <button class="py-2 px-4 ring-1 ring-slate-300 hover:bg-gray-100 ">Select Image</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- need more enhace -->
        <!-- Order -->
        <div v-if="orderActive" class="w-full bg-white rounded-md p-5">
            <div class="border-b-[1px] border-solid border-stone-200 mb-4">
                <h2>Completed order</h2>
            </div>

            <table class="table">
                <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>Picture</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>


                    </tr>
                </thead>
                <tbody class="">
                    <tr v-for="order in orderData">
                        <td>{{ order.id }}</td>
                        <td><img :src="`/storage/${order.img}`" alt="Order Image" loading="lazy"></td>
                        <td>{{ order.name }}</td>
                        <td>{{ order.price }}</td>
                        <td>{{ order.pivot.quantity }}</td>
                        <td>{{ order.pivot.subtotal }}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios'
export default {
    data() {
        return {
            profileActive: true,
            orderActive: false,
            name: this.userName,
            email: this.userEmail,
        };
    },
    props: ['userName', 'userEmail', 'userId', 'orderData'],
    methods: {
        profile() {
            if (this.orderActive == true) {
                this.profileActive = true
                this.orderActive = false
            }
        },
        Order() {
            if (this.profileActive == true) {
                this.profileActive = false
                this.orderActive = true
            }
        },

        async submitProfile() {
            try {
                let response = await axios.patch('/profile/edit/' + this.userId, {
                    'name': this.name,
                }).then(response => {
                    console.log('success Profile', response.data.message);
                    window.location.href = '/profile';

                })

            } catch (error) {
                console.log(error);
            }

            console.log('Success prfile', response.data.message);

        }
    }
};
</script>
  
<style>
/* Add any additional styles here */
</style>
  