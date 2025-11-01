<script setup lang="ts">
import FoodCard from './component/FoodCard.vue'
import Burger from './assets/img/burger.png'
import Cake from './assets/img/cake.png'
import Pizza from './assets/img/pizza.png'
import Salad from './assets/img/salad.png'
import Apple from './assets/img/apple.png'
import Peach from './assets/img/peach.png'
import Banana from './assets/img/banana.png'
import PromoCard from './component/PromoCard.vue'
import Vegetable from './assets/img/vegetable.png'
import Milk from './assets/img/milk.png'
import Onion from './assets/img/onion.png'


const foods = [
  {
    image: Burger,
    title: 'Burger',
    items: 12,
  },
  {
    image: Cake,
    title: 'Cake & Milk',
    items: 8,
  },
  {
    image: Pizza,
    title: 'Pizza',
    items: 15,
  },
  {
    image: Salad,
    title: 'Salad',
    items: 10,
  },
  {
    image: Apple,
    title: 'Apple Pie',
    items: 5,
  },
  {
    image: Peach,
    title: 'Peach',
    items: 7,
  },
  {
    image: Banana,
    title: 'Banana',
    items: 9,
  },
]

const  promos = [
  {
    title: 'Fresh Fruits & Clean Vegetables',
    image: Onion,
    bgColor: '#ffe0b2', // light orange
    btnColor: '#fb8c00', // dark orange
  },
  {
    title: 'Healthy Vegetables',
    image: Vegetable,
    bgColor: '#c8e6c9', // light green
    btnColor: '#388e3c', // dark green
  },
  {
    title: 'Dairy Products',
    image: Milk,
    bgColor: '#bbdefb', // light blue
    btnColor: '#1976d2', // dark blue
  },
]

</script>

<template>
  <!-- <h1>Hello This is my first vue project</h1> -->
   <!-- Category Section -->
  <div>
    <div class="app">
      <div class="card-grid">
        <FoodCard
          v-for="(food,index) in foods"
          :key="index"
          :image="food.image"
          :title="food.title"
          :items="food.items" />
      </div>
    </div>
  </div>

  <!-- <Adsvertise /> -->
    <div class="app">
    <div class="promo-section">
      <PromoCard
        v-for="(promo, index) in promos"
        :key="index"
        :title="promo.title"
        :image="promo.image"
        :bgColor="promo.bgColor"
        :btnColor="promo.btnColor"
      />
    </div>
  </div>
</template>

<style scoped>

.app{
  min-height:20vh;
  display: flex;
  /* border: 1px solid #333; */
  border-radius: 10px;
  align-items: center;
  justify-content: center;
  padding: 10px;
  margin-top: 20px;

}
.card-grid{
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
}
.promo-section{
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  margin-bottom: 15px;
}


</style>

