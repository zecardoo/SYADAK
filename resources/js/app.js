/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";
import Notifications from "@kyvg/vue3-notification";
import mitt from 'mitt';


/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});
app.use(Notifications);
const eventBus = mitt();
app.provide('eventBus',eventBus);


import Menu from "./components/Menu.vue";
app.component("menu-btn", Menu);

import Cart from "./components/Cart.vue";
app.component("cart-btn", Cart);

import AddCart from "./components/AddCart.vue";
app.component("addcart-btn", AddCart);

import Notification from "./components/Notification.vue";
app.component("notification-alart", Notification);

import Payment from "./components/Payment.vue";
app.component("payment-btn", Payment);

import Dashborad from "./components/admin/Dashborad.vue";
app.component("dashborad-btn", Dashborad);

import Quantitybtn from "./components/Quantitybtn.vue";
app.component("quantity-btn", Quantitybtn);

import Checkout from "./components/Checkout.vue";
app.component("checkout-btn", Checkout);

import CheckoutQuantity from "./components/CheckoutQuantity.vue";
app.component("checkoutquantity-btn", CheckoutQuantity);

import Profile from "./components/Profile.vue";
app.component("profile-btn", Profile);

import Users from "./components/admin/Users.vue";
app.component("users-btn", Users);

import Category from "./components/admin/Category.vue"
app.component("category-btn", Category);

import Product from "./components/admin/Product.vue"
app.component("product-btn", Product);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount("#app");

