<template>
    <table class="table">
        <thead class="">
            <tr>
                <th>Name</th>
                <th>Description </th>
                <th>Picture</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="">
            <tr v-for="(category, index) in this.categoryTable" :key="index">
                <td>{{ category.name }}</td>
                <td>{{ category.description }}</td>
                <td><img :src="`/storage/${category.img}`" loading="lazy"></td>
                <td>
                    <div @click="categoryEdit(category.id)">
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
                <form @submit.prevent="editCategory"
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
                            <i class="fa-solid fa-list text-3xl"></i>
                        </div>
                    </div>


                    <!-- category info -->
                    <div class="grid grid-cols-3 mt-8 border-b-2 border-solid border-stone-300 pb-8">
                        <!-- category Name -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">Name: </span>
                            <input type="text" v-model="name" class="text-xl font-medium" required>
                        </label>

                        <!-- category description -->
                        <label for="" class="flex items-center gap-4">
                            <span class="text-xl font-serif font-semibold">description: </span>
                            <input type="text" v-model="description" class="text-xl font-medium" required>
                        </label>

                        <!-- category img -->
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

                            <a @click="deleteCategory"
                            class="text-xl text-white font-semibold bg-red-500 py-2 px-8 rounded-md shadow-lg">Delete</a>

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

            categoryID: '',
            name: '',
            description: '',
            img: '',
            imageData: null,

            // category table
            categoryTable: [],
        }
    },

    props: ['categoryData'],

    methods: {
        categoryEdit(categoryId) {
            const category = this.categoryData.find(category => category.id === categoryId);

            this.categoryID = category.id;
            this.name = category.name;
            this.description = category.des;
            this.img = category.img;

            this.showModal = true;
        },

        async editCategory() {
            try {
                let data = new FormData();
                data.append('_method', 'PATCH'); // or 'PATCH'
                if (this.imageData) {
                    data.append('img', this.imageData); // Append image data

                } else {
                }
                data.append('name', this.name); // Append other form data
                data.append('description', this.description); // Append other form data

                let response = await axios.post(`/edit/category/${this.categoryID}`, data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log('Category----> ', response.data.message);
                })
            } catch (error) {
                console.log(error);
            }

        },

        async deleteCategory(){
            try {
                let response = await axios.delete(`delete/category/${this.categoryID}`).then(response => {
                window.location.href = '/category';
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
        for (let item of this.categoryData) {
            this.categoryTable.push({
                id: item.id,
                name: item.name,
                description: item.des,
                img: item.img
            });
        }

    }
}
</script>
