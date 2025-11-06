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
import ProductCard from './component/ProductCard.vue'


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

const promos = [
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


const products = [
  {
    image: Apple,
    brand: 'Fresh Farms',
    name: 'Red Apple',
    rating: 4.5,
    weight: '1 kg',
    price: 3.99,
    oldPrice: 4.99,
    discount: 20,
  },
  {
    image: Banana,
    brand: 'Tropical Fruits',
    name: 'Ripe Bananas',
    rating: 4.2,
    weight: '1.5 kg',
    price: 2.49,
    oldPrice: 3.49,
    discount: 29,
  },
  {
    image: Peach,
    brand: 'Orchard Fresh',
    name: 'Juicy Peaches',
    rating: 4.7,
    weight: '1 kg',
    price: 4.29,
    oldPrice: 5.29,
    discount: 19,
  },
  {
    image: Salad,
    brand: 'Green Valley',
    name: 'Fresh Salad Mix',
    rating: 4.3,
    weight: '500 g',
    price: 2.99,
    oldPrice: 3.99,
    discount: 25,
  },
  {
    image: Cake,
    brand: 'Sweet Treats',
    name: 'Chocolate Cake',
    rating: 4.8,
    weight: '750 g',
    price: 15.99,
    oldPrice: 19.99,
    discount: 20,
  },
  {
    image: Pizza,
    brand: 'Italiano',
    name: 'Margherita Pizza',
    rating: 4.6,
    weight: '300 g',
    price: 8.49,
    oldPrice: 10.49,
    discount: 19,
  },
  {
    image: Burger,
    brand: 'Fast Bites',
    name: 'Beef Burger',
    rating: 4.4,
    weight: '250 g',
    price: 5.99,
    oldPrice: 7.49,
    discount: 20,
  },
  {
    image: Onion,
    brand: 'Veggie World',
    name: 'Fresh Onions',
    rating: 4.1,
    weight: '1 kg',
    price: 1.99,
    oldPrice: 2.49,
    discount: 20,
  },
]
</script>

<template>
  <!-- <h1>Hello This is my first vue project</h1> -->
  <!-- Categories row: title on the left, UL on the right -->
  <div class="categories-row" style="margin:15px; font-family: 'Courier New', Courier, monospace;">
    <div class="Category" style="margin: 15px; margin-left: 10%; font-size: larger;">
      <h2>Featured Categories</h2>
    </div>
    <ul class="category-list" style=" margin-right: 10%;">
      <li style="font-weight: bold;">All</li>
      <li>Fruits</li>
      <li>Vegetables</li>
      <li>Dairy</li>
      <li>Grains</li>
      <li>Meat</li>
      <li>Seafood</li>
    </ul>
  </div>
  <!-- Category Section -->
  <div>
    <div class="app">
      <div class="card-grid">
        <FoodCard v-for="(food, index) in foods" :key="index" :image="food.image" :title="food.title"
          :items="food.items" />
      </div>
    </div>
  </div>

  <!-- <Adsvertise /> -->
  <div class="app">
    <div class="promo-section">
      <PromoCard v-for="(promo, index) in promos" :key="index" :title="promo.title" :image="promo.image"
        :bgColor="promo.bgColor" :btnColor="promo.btnColor" />
    </div>
  </div>

  <div class="popular-row" style="font-family: 'Courier New', Courier, monospace;display: flex; align-items: center; justify-content: space-between; margin: 15px;">
    <div class="Category" style="margin-left: 10%; font-size: large; ">
      <h2>Popular Products</h2>
    </div>
    <ul class="category-list" style=" margin-right: 10%;">
      <li style="font-weight: bold;">All</li>
      <li>Fruits</li>
      <li>Vegetables</li>
      <li>Dairy</li>
      <li>Grains</li>
      <li>Meat</li>
      <li>Seafood</li>
    </ul>
  </div>

  <div class="app">
    <div class="product-grid">
      <ProductCard v-for="(product, index) in products" :key="index" :image="product.image" :brand="product.brand"
        :name="product.name" :rating="product.rating" :weight="product.weight" :price="product.price"
        :oldPrice="product.oldPrice" :discount="product.discount" />
    </div>

  </div>




</template>

<style scoped>
.Category:hover {
  margin-left: 10%;
  font-size: large;
  color: #3bb77e;
  font-weight: bold;
}

.categories-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 20px 0;
}

.categories-row .Category h2 {
  margin: 0;
  font-size: 1.25rem;
}

.category-list {
  display: flex;
  list-style: none;
  padding: 0;
  gap: 12px;
  margin: 0;
  align-items: center;
}

.category-list li {
  cursor: pointer;
}

.category-list li:hover {
  font-weight: bold;
  color: #3bb77e;
  transform: scale(1.1);
}

.app {
  min-height: 20vh;
  display: flex;
  /* border: 1px solid #333; */
  border-radius: 10px;
  align-items: center;
  justify-content: center;
  padding: 10px;
  margin-top: 20px;

}

.card-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
}

.promo-section {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
  margin-bottom: 15px;
}
.product-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  justify-content: center;
  margin-bottom: 5%;
}

</style>
