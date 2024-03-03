<template>
    <table class="table">
        <thead class="">
            <tr>
                <th>Seller</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price </th>
                <th>Quantity </th>
                <th>Sold </th>
                <th>Picture</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="">
            <tr v-for="(product, index) in this.productTable" :key="index">
                <td>{{ product.seller }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.description }} KG</td>
                <td>{{ product.category }}</td>
                <td>SAR {{ product.price }}.00</td>
                <td>{{ product.quantity }}</td>
                <td>{{ product.sold }}</td>
                <td><img :src="`/storage/${product.img}`" loading="lazy"></td>
                <td>
                    <div @click="productEdit(product.id)">
                        <button class="text-3xl text-red-400"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    <div v-if="showModal">
        <div class="modal">
            <div class="min-h-screen flex justify-center items-center">
                <!-- notification -->
                <notification-alart></notification-alart>
                <form @submit.prevent="editProduct"
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
                            <i class="fa-brands fa-product-hunt text-4xl"></i>
                        </div>
                    </div>


                    <!-- Prodcut info -->
                    <div class="grid grid-cols-4 gap-8 mt-8 border-b-2 border-solid border-stone-300 pb-8">
                        <!-- Prodcut Name -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Name: </span>
                            <input type="text" v-model="name" class="text-xl font-medium" required>
                        </label>



                        <!-- Prodcut description -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">description: </span>
                            <input type="text" v-model="description" class="text-xl font-medium" required>
                        </label>


                        <!-- Prodcut price -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Price: </span>
                            <input type="text" v-model="price" class="text-xl font-medium" required>
                        </label>

                        <!-- Prodcut quantity -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Quantity: </span>
                            <input type="text" v-model="quantity" class="text-xl font-medium" required>
                        </label>

                        <!-- Prodcut img -->
                        <label for="" class="flex  items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Image: </span>
                            <div class="flex justify-center items-center gap-2">
                                <input type="file" @change="handleFileUpload" class="text-xl font-medium w-full"
                                    accept="image/*, .pdf">
                                <img :src="`/storage/${img}`" class="w-1/5 rounded-full">

                            </div>
                        </label>



                    </div>

                    <div class="flex flex-row-reverse gap-5  mt-8 float-right">
                        <button @click="" type="submit"
                            class="text-xl text-white font-semibold bg-blue-500 py-2 px-8 rounded-md shadow-lg">
                            Save</button>

                        <a @click="deleteProduct"
                            class="text-xl text-white font-semibold bg-red-500 py-2 px-8 rounded-md shadow-lg cursor-pointer">Delete</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
// import axios from 'axios';
import axios from 'axios';

export default {
    data() {
        return {
            showModal: false,

            productID: '',
            name: '',
            price: '',
            quantity: '',
            description: '',
            img: '',
            imageData: null,

            // category table
            productTable: [],
        }
    },

    props: ['productData', 'sellerData', 'categoryData'],

    methods: {
        productEdit(productID) {
            const product = this.productData.find(product => product.id === productID);

            this.productID = product.id;
            this.name = product.name;
            this.price = product.price;
            this.quantity = product.quantity;
            this.description = product.description;
            this.img = product.img;

            this.showModal = true;
        },

        async editProduct() {
            try {
                let data = new FormData();
                data.append('_method', 'PATCH'); // or 'PATCH'
                if (this.imageData) {
                    data.append('img', this.imageData); // Append image data

                } else {
                }
                data.append('name', this.name);
                data.append('price', this.price);
                data.append('quantity', this.quantity);
                data.append('description', this.description); 

                let response = await axios.post(`/edit/prodcut/${this.productID}`, data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log('product----> ', response.data.message);
                })
            } catch (error) {
                console.log(error);
            }

        },

        async deleteProduct() {
            try {
                let response = await axios.delete(`delete/product/${this.productID}`).then(response => {
                    window.location.href = '/product';
                })
            } catch (error) {
                console.log(error);
            }
        },


        async handleFileUpload(event) {
            this.imageData = event.target.files[0];
            console.log('hand', this.imageData);

        }
    },

    mounted() {
        for (let item of this.productData) {
            const seller = this.sellerData.find(seller => seller.id === item.user_id);
            const category = this.categoryData.find(category => category.id === item.category_id);
            this.productTable.push({
                id: item.id,
                seller: seller.name,
                name: item.name,
                description: item.description,
                category: category.name,
                price: item.price,
                quantity: item.quantity,
                sold: item.sold,
                img: item.img
            });
            console.log(seller);

        }

    }
}
</script>
