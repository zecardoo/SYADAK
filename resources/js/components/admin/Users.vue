<template>
    <section class="">
        <div class="float-right mb-2 pr-4 ">
            <input type="search" v-model="searchQuery" @input="fetchData" class="placeholder:text-base" placeholder="Search..." required>

            <!-- <button class="text-2xl text-stone-300"><i class="fa-solid fa-magnifying-glass"></i></button> -->
        </div>

        <!-- table user  -->
        <table class="table" v-if="!search">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-for="(user, index) in data" :key="index">
                <tr>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                    <td><span @click="userModal(user.id)"
                            class="p-2 bg-red-300 text-white rounded-md shadow-md cursor-pointer hover:bg-red-400"><i
                                class="fa-solid fa-user-pen"></i></span>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Search table  -->
        <table class="table" v-if="search">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-for="(user, index) in filteredData" :key="index">
                <tr>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                    <td><span @click="userModal(user.id)"
                            class="p-2 bg-red-300 text-white rounded-md shadow-md cursor-pointer hover:bg-red-400"><i
                                class="fa-solid fa-user-pen"></i></span>
                    </td>
                </tr>
            </tbody>
        </table>


        <div v-if="showModal" class="modal">

            <!-- notification -->
            <notification-alart></notification-alart>
            <!-- View page -->
            <div class=" min-h-screen flex justify-center items-center">
                <!-- User Form-->
                <form @submit.prevent="submitUser"
                    class="container mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700 mt-10">

                    <!-- close btn -->
                    <span @click="showModal = false"
                        class="text-3xl text-stone-400 font-semibold cursor-pointer float-right hover:text-red-500">
                        <i class="ri-close-fill"></i>
                    </span>

                    <!-- iconn of card bank -->
                    <div class="w-full pt-1 pb-5">
                        <div
                            class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                            <i class="ri-user-3-line text-3xl"></i>
                        </div>
                    </div>

                    <!-- user Info -->
                    <div class="grid grid-cols-3 mt-8 border-b-2 border-solid border-stone-300 pb-8">
                        <!-- user Name -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Name: </span>
                            <input type="text" v-model="name" class="text-xl font-medium" required>
                        </label>
                        <!-- user email -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Email: </span>
                            <input type="email" v-model="email" class="text-xl font-medium" required>
                        </label>

                        <!-- user role -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Role: </span>
                            <select class="text-xl w-[16rem]" v-model="role" required>
                                <option value="user">User</option>
                                <option value="seller">Seller</option>
                                <!-- Add more options if needed -->
                            </select>
                        </label>

                    </div>

                    <!-- Order table -->
                    <div>
                        <div class="my-8">
                            <a href="#" @click="hideOrder = !hideOrder">
                                <h1 v-if="hideOrder">Order Table <span><i class="fa-solid fa-caret-down"></i></span> </h1>
                                <h1 v-if="!hideOrder">Order Table <span><i class="fa-solid fa-caret-right"></i></span> </h1>

                            </a>
                        </div>
                        <table class="table" v-if="!hideOrder">
                            <thead>
                                <tr>
                                    <th>Seller</th>
                                    <th>Product</th>
                                    <th>Descrption</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody v-for="(detail, index) in orderDetails" :key="index">
                                <tr>
                                    <td>{{ detail.seller }}</td>
                                    <td><img :src="`/storage/${detail.img}`" alt="Product image">
                                        {{ detail.product }}</td>

                                    <td>{{ detail.description }} KG</td>
                                    <td>{{ detail.category }}</td>
                                    <td>SAR {{ detail.price }}.00</td>
                                    <td>{{ detail.quantity }}</td>
                                    <td>SAR {{ detail.subtotal }}.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <!-- product table  -->
                    <div v-if="showProduct">
                        <div class="my-8">
                            <a href="#" @click="hideProduct = !hideProduct">
                                <h1 v-if="hideProduct">Product Table <span><i class="fa-solid fa-caret-down"></i></span>
                                </h1>
                                <h1 v-if="!hideProduct">Product Table <span><i class="fa-solid fa-caret-right"></i></span>
                                </h1>

                            </a>
                        </div>

                        <table class="table" v-if="!hideProduct">
                            <thead>
                                <tr>
                                    <th>Seller</th>
                                    <th>Product</th>
                                    <th>Descrption</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>sold</th>
                                </tr>
                            </thead>
                            <tbody v-for="(detail, index) in productDetails" :key="index">
                                <tr>
                                    <td>{{ detail.seller }}</td>
                                    <td><img :src="`/storage/${detail.img}`" alt="Product image">
                                        {{ detail.product }}</td>

                                    <td>{{ detail.description }} KG</td>
                                    <td>{{ detail.category }}</td>
                                    <td>SAR {{ detail.price }}.00</td>
                                    <td>{{ detail.quantity }}</td>
                                    <td>{{ detail.sold }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Action -->
                    <div class="flex flex-row-reverse gap-5  mt-8 float-right">
                        <button type="submit"
                            class="text-xl text-white font-semibold bg-blue-500 py-2 px-8 rounded-md shadow-lg">
                            Save</button>
                        <!-- <button @click="showView = true"
                            class="text-xl text-white font-semibold bg-blue-500 py-2 px-8 rounded-md shadow-lg">View</button> -->
                        <a @click="deleteUser"
                            class="text-xl text-white font-semibold bg-red-500 py-2 px-8 rounded-md shadow-lg">Delete</a>
                    </div>


                </form>
            </div>
        </div>

    </section>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            showModal: false,
            showProduct: false,
            hideOrder: false,
            hideProduct: false,
            search: false,
            name: '',
            email: '',
            role: '',
            userID: '',

            // order section 
            orderDetails: [],


            // product section
            productDetails: [],

            //search 
            searchQuery: '',
            data: [], // Your original data
            filteredData: [] // Filtered data based on search query
        }
    },

    props: ['userData', 'orderData', 'categoryData', 'productData'],

    methods: {
        async submitUser() {
            try {
                let response = await axios.patch('/profile/user/edit/' + this.userID, {
                    'name': this.name,
                    'email': this.email,
                    'role': this.role,

                }).then(response => {
                    // console.log('success --> ', response.data.message)

                    this.$notify({
                        group: 'User-update',
                        text: 'User edited successfully',
                        type: 'success'
                    });
                })

            } catch (error) {
                console.log(error);
            }

        },

        async deleteUser() {
            try {
                let response = await axios.delete('/delete/' + this.userID)
                console.log('delete --> ', response.data.message);
                // window.location.href = '/users';
                this.$notify({
                    group: 'User-update',
                    text: 'User Deleted successfully',
                    type: 'success'
                });
            } catch (error) {
                console.log('Error deleting user:', error);
                // Handle error: display error message or log the error
                this.$notify({
                    group: 'User-update',
                    text: 'Failed to delete user',
                    type: 'error'
                });
            }
        },

        userModal(userId) {
            // Find the clicked user based on the user ID
            const user = this.userData.find(user => user.id === userId);
            const order = this.orderData.find(order => order.user_id === userId);
            const userproduct = this.productData.find(userproduct => userproduct.user_id === userId);

            // only if the user selected is seller
            if (user.role === 'seller') {
                this.productDetails = [];
                this.showProduct = true
                for (let product of this.productData) {

                    // only the product of the user selected 
                    if (userId === product.user_id) {
                        const seller = this.userData.find(seller => seller.id === product.user_id);
                        const category = this.categoryData.find(category => category.id === product.category_id);

                        // product info
                        this.productDetails.push({
                            seller: seller.name,
                            product: product.name,
                            description: product.description,
                            category: category.name,
                            price: product.price,
                            quantity: product.quantity,
                            sold: product.sold,
                            img: product.img

                        })

                    }

                }
            } else {
                this.showProduct = false
            }




            // ## order Table ##

            // empty the array 
            this.orderDetails = [];
            // Loop through the products in the order and display pivot table data
            order.products.forEach(product => {
                const seller = this.userData.find(seller => seller.id === product.user_id);
                const category = this.categoryData.find(category => category.id === product.category_id);

                // order indo 
                this.orderDetails.push({
                    seller: seller.name,
                    product: product.name,
                    img: product.img,
                    category: category.name,
                    description: product.description,
                    price: product.price,
                    quantity: product.pivot.quantity,
                    subtotal: product.pivot.subtotal
                })
            });


            // Update the data properties with the user details
            this.name = user.name;
            this.email = user.email;
            this.role = user.role;
            this.userID = user.id;

            // Show the modal
            this.showModal = true;
        },

        // ## Search ## 


        fetchData() {

            if (this.searchQuery) {
                this.search = true;

                this.filteredData = this.data.filter(item =>
                    item.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    item.email.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    item.role.toLowerCase().includes(this.searchQuery.toLowerCase())
                );

            } else {
                this.search = false;
            }
        },

    },

    mounted() {
        for (let user of this.userData) {

            this.data.push({
                id: user.id,
                name: user.name,
                email: user.email,
                role: user.role
            })
        }

        console.log(this.data);
    }

}


</script>
