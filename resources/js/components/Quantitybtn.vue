<template>
  <div class="flex items-center gap-8">
    <div>
      <h3 class="text-base text-stone-400">Quantity</h3>
    </div>

    <div class="flex items-center border border-solid border-stone-200 px-3  rounded-md">
      <button @click="decrement" :disabled="quantity === 1"
        class="text-stone-500 text-lg pr-4 disabled:cursor-not-allowed">
        <i class="fas fa-minus"></i>
      </button>

      <input type="number" v-model.number="quantity" :max="maxQuantity" min="1" @input="updateQuantity"
        class="quantity-input rounded-none border-x-[1px] border-solid border-stone-200 shadow-none text-center" />

      <button @click="increment" :disabled="quantity === maxQuantity"
        class="text-stone-500 text-lg pl-4 disabled:cursor-not-allowed">
        <i class="fas fa-plus"></i>
      </button>
    </div>

    <div class="text-stone-400 text-base">
      <p>{{ maxQuantity }} pieces available</p>
    </div>
  </div>
</template>

<script>
export default {
  inject: ["eventBus"],

  data() {
    return {
      quantity: 1,
      maxQuantity: this.productQuantity,
    };
  },

  props: ['productQuantity'],

  methods: {
    increment() {
      if (this.quantity < this.maxQuantity) {
        this.quantity += 1;
        this.eventBus.emit("quantity", this.quantity);
      }
    },

    decrement() {
      if (this.quantity > 1) {
        this.quantity -= 1;
        this.eventBus.emit("quantity", this.quantity);
      }
    },

    updateQuantity() {
      if (this.quantity < 1) {
        this.quantity = 1;
      } else if (this.quantity > this.maxQuantity) {
        this.quantity = this.maxQuantity;
      }
      this.eventBus.emit("quantity", this.quantity);
    },
  },
};
</script>

<style scoped>
/* Add your styles here */

.quantity-input::-webkit-inner-spin-button,
.quantity-input::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
