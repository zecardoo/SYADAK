<template>
    <div>
        <button @click="showModal = true"
            class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">CheckOut</button>
        <div class="modal" v-if="showModal">

            <!-- payment page -->
            
            <form @submit.prevent="submitForm"
                class="min-w-screen min-h-screen flex items-center justify-center px-5 pb-10 pt-16">

                <!-- model should be this later change  -->
                <div class="container mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700 mt-10"
                    style="max-width: 600px">
                    <!-- close page -->
                    <span class="close" v-on:click="showModal = false">
                        <i class="ri-close-fill"></i>
                    </span>

                    <!-- iconn of card bank -->
                    <div class="w-full pt-1 pb-5">
                        <div
                            class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                            <i class="mdi mdi-credit-card-outline text-3xl ri-bank-card-2-line"></i>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
                    </div>

                    <!-- img of bank card like visa  -->
                    <div class="mb-3 flex -mx-2">
                        <div class="px-2">
                            <label for="type1" class="flex items-center cursor-pointer">
                                <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1"
                                    checked>
                                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png"
                                    class="h-8 ml-3" loading="lazy">
                            </label>
                        </div>
                        <div class="px-2">
                            <label for="type2" class="flex items-center cursor-pointer">
                                <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">
                                <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png"
                                    class="h-8 ml-3" loading="lazy">
                            </label>
                        </div>
                    </div>

                    <!-- input name card  -->
                    <div class="mb-4">
                        <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
                        <div>
                            <input class="w-full" placeholder="John Smith" type="text" autocomplete="cc-name" required />
                        </div>
                    </div>

                    <!-- input card number  -->
                    <div class="mb-4">
                        <label class="font-bold text-sm mb-2 ml-1">Card number</label>
                        <div>
                            <input class="w-full" placeholder="0000 0000 0000 0000" type="text" autocomplete="cc-number" />
                        </div>
                    </div>

                    <!-- input card date month and year-->
                    <div class="mb-4 -mx-2 flex items-end">
                        <div class="px-2 w-1/2">
                            <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                            <div>
                                <select class="w-full cursor-pointer" autocomplete="cc-exp-month">
                                    <option value="01">01 - January</option>
                                    <option value="02">02 - February</option>
                                    <option value="03">03 - March</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - May</option>
                                    <option value="06">06 - June</option>
                                    <option value="07">07 - July</option>
                                    <option value="08">08 - August</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - October</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - December</option>
                                </select>
                            </div>
                        </div>
                        <div class="px-2 w-1/2">
                            <select class="w-full cursor-pointer" autocomplete="cc-exp-year">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                            </select>
                        </div>
                    </div>

                    <!-- CVV -->
                    <div class="mb-10">
                        <label class="font-bold text-sm mb-2 ml-1">CVV</label>
                        <div>
                            <input class="w-32" placeholder="000" type="text" />
                        </div>
                    </div>
                    <div>
                        <button
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><i
                                class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios';
export default {
    data() {
        return {
            showModal: false
        }
    },

    methods: {
       async submitForm() {
            try {
                let response = await axios.post('/payment').then(response =>{
                    // console.log('success', response.data.message); 
                    window.location.href = '/';

                })

            } catch (error) {
                console.log(error);
            }

        }
    }
}
</script>
  
<style>
/* .modal {
    display: block;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
} */

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    border-radius: 0.5rem;

}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
  