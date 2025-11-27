<template>
  <div class="product-card">
    <p class="discount-badge">-{{ discount }}%</p>
    <img :src="image" alt="image" class="product-image" />
    <div class="product-info">
      <p class="brand">{{ brand }}</p>
      <p class="name">{{ name }}</p>
      <div class="rating">
        <span v-for="i in 5" :key="i" class="star" :class="{ filled: i <= Math.floor(rating) }">★</span>
        {{ rating }}
        <!-- <span class="rating-value">{{ rating.toFixed(1) }}</span> -->
      </div>
      <p class="weight">Weight: {{ weight }}</p>

      <div class="bottom-section">
        <div class="price-section">
          <span class="new-price">${{ price.toFixed(2) }}</span>
          <span class="old-price">${{ oldPrice.toFixed(2) }}</span>
        </div>
        <div class="quantity-control">
          <input type="number" min="1" v-model.number="quantity" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const props = defineProps<{
  image: string
  brand: string
  name: string
  rating: number
  weight: string
  price: number
  oldPrice: number
  discount: number
}>()

const { image, brand, name, rating, weight, price, oldPrice, discount } = props

const quantity = ref<number>(1)
</script>

<style scoped>
.product-card {
  width: 240px;
  background: lch(93.43% 5.82 95.31);
  border: 1px solid #86a67c;
  border-radius: 12px;
  display: grid;
  padding: 12px;
  margin-bottom: 12px;
  cursor: pointer;
  position: relative;
  font-family: 'Courier New', Courier, monospace;
  transition: transform 0.3s ease, box-shadow 0.3s ease;

}

.product-card:hover {
  box-shadow: 0 4px 12px rgba(29, 28, 28, 0.1);
  transform: translateY(-5px);
}

.discount-badge {
  position: absolute;
  top: 10px;
  left: 5px;
  background: #3bb77e;
  color: white;
  padding: 4px 12px;
  border-radius: 4px;
  font-size: 14px;
  font-weight: bold;
  z-index: 1;
}

.product-image {
  width: 80%;
  height: 180px;
  object-fit: contain;
  margin-bottom: 12px;
  display: flex;
  justify-self: center;
  align-items: center;
}

.product-info {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.brand {
  color: #7e7e7e;
  font-size: 13px;
  margin: 0;
}

.name {
  font-size: 16px;
  font-weight: 600;
  color: #253d4e;
  margin: 0;
  line-height: 1.4;
}

.rating {
  display: flex;
  align-items: center;
  gap: 6px;
  margin: 4px 0;
}

.stars {
  display: flex;
  gap: 2px;
}

.star {
  color: #d0d0d0;
  font-size: 16px;
}

.star.filled {
  color: #ffc107;
}

.rating-value {
  color: #7e7e7e;
  font-size: 13px;
}

.weight {
  color: #7e7e7e;
  font-size: 14px;
  margin: 0;
}

.bottom-section {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 12px;
}

.price-section {
  display: flex;
  align-items: center;
  gap: 8px;
}

.new-price {
  color: #3bb77e;
  font-size: 20px;
  font-weight: bold;
}

.old-price {
  color: #adadad;
  font-size: 16px;
  text-decoration: line-through;
}

.quantity-control {
  display: flex;
  align-items: center;
}

.quantity-control input {
  width: 50px;
  height: 36px;
  border: 1px solid #bce3c9;
  border-radius: 4px;
  text-align: center;
  font-size: 14px;
  color: #3bb77e;
  background: #f2fdf4;
}

.quantity-control input:focus {
  outline: none;
  border-color: #3bb77e;
}

/* Remove spinner buttons in Chrome, Safari, Edge */
.quantity-control input::-webkit-outer-spin-button,
.quantity-control input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Remove spinner buttons in Firefox */
.quantity-control input[type=number] {
  -moz-appearance: textfield;
  appearance: textfield;
}
</style>
