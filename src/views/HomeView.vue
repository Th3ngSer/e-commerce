<template>
  <div class="Head ">
    <div class="Headbar ">
      <div class="logo">
        <h2>ShopMate</h2>
      </div>
      <div class="search-bar">
         <div class="dropdown">
          <button
            class="dropdown-btn"
            aria-haspopup="menu"
            aria-expanded="false"
            title="Choose category"
            style="display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:8px;border:none;background:transparent;cursor:pointer;font-weight:600;color:#2f7d55;"
          >
            <span>All Categories</span>
          </button>
          <div class="dropdown-menu">
            <a href="#">Fast Food</a>
            <a href="#">Snacks</a>
            <a href="#">Rice</a>
          </div>
        </div>
        <input class="search" type="text" placeholder="Search for products..." />
      </div>

      <div class="user-actions">
        <button class="action-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
        Profile
      </button>

      <button class="action-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 7h6"></path>
        <path d="M3 12h6"></path>
        <path d="M3 17h6"></path>
            <path d="M14 7h7"></path>
            <path d="M14 12h7"></path>
            <path d="M14 17h7"></path>
            <path d="M11 5l2 14"></path>
          </svg>
          Compare
        </button>

        <button class="action-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path
              d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z">
            </path>
          </svg>
          WishList
        </button>

        <button class="action-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 6h15l-1.5 9h-12z"></path>
            <circle cx="9" cy="20" r="1"></circle>
            <circle cx="18" cy="20" r="1"></circle>
          </svg>
          Cart
        </button>
      </div>
    </div>
  </div>

  <Group />

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
  <!-- Popular Products Section -->

  <div class="popular-row"
    style="font-family: 'Courier New', Courier, monospace;display: flex; align-items: center; justify-content: space-between; margin: 15px;">
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

<script setup lang="ts">
import FoodCard from '../component/FoodCard.vue'
import Burger from '../assets/img/burger.png'
import Cake from '../assets/img/cake.png'
import Pizza from '../assets/img/pizza.png'
import Salad from '../assets/img/salad.png'
import Apple from '../assets/img/apple.png'
import Peach from '../assets/img/peach.png'
import Banana from '../assets/img/banana.png'
import Vegetable from '../assets/img/vegetable.png'
import Milk from '../assets/img/milk.png'
import Onion from '../assets/img/onion.png'
import PromoCard from '../component/PromoCard.vue'
import ProductCard from '../component/ProductCard.vue'
import Group from '../component/Group.vue'


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

import { ref, onMounted } from 'vue'
import axios from 'axios'

const categories = ref([]);
const promotions = ref([]);
const groups = ref([]);

async function fetchCategories() {
  const res = await axios.get("http://localhost:3000/api/categories");
  categories.value = res.data;
}

async function fetchPromotions() {
  const res = await axios.get("http://localhost:3000/api/promotions");
  promotions.value = res.data;
}

async function fetchGroups() {
  const res = await axios.get("http://localhost:3000/api/groups");
  groups.value = res.data;
}

// Life-cycle
onMounted(() => {
  fetchCategories()
  fetchPromotions()
  fetchGroups()
})
</script>


<style scoped>
.Head {
  width: 100%;
  height: auto;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
  margin-bottom: 10px;
}

.Headbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 40px;
  background-color: #ffffff;

}

.logo h2 {
  margin: 0;
  color: #3bb77e;
  font-family: 'Courier New', Courier, monospace;
}

.search-bar{
  padding: 8px 12px;
  border: 1px solid #57c290;
  border-radius: 4px;
  width: 40%;
  display: flex;
}
.search{
  border: none;
  outline: none;
  width: 40%;
  font-size: 15px;
}

.dropdown {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  color: #333;
  background-color: #fff;
  border: 1px solid rgba(87, 194, 144, 0.25);
  border-radius: 8px;
  margin-right: 10px;
  font-size: 15px;
  font-weight: 500;
  text-decoration: none;
  position: relative; /* needed for the absolute dropdown-menu */
  cursor: pointer;
  transition: background-color .18s ease, box-shadow .18s ease, transform .08s ease;
  user-select: none;
  min-width: 120px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.06);
}

/* small caret appended to the button */
.dropdown::after {
  content: "▾";
  font-size: 12px;
  color: #5a5a5a;
  margin-left: 6px;
  transition: transform .18s ease;
}

/* hover / active states */
.dropdown:hover {
  background-color: #f7fff9;
  border-color: #57c290;
  box-shadow: 0 6px 18px rgba(87,194,144,0.08);
  transform: translateY(-1px);
}

.dropdown:active {
  transform: translateY(0);
}

.dropdown:focus,
.dropdown:focus-visible {
  outline: none;
  box-shadow: 0 0 0 4px rgba(87,194,144,0.12);
}
.dropdown-menu a:hover {
  display: block;
  background-color: #27ae60
}

.dropdown-menu {
  position: absolute;
  background: white;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  border-radius: 6px;
  padding: 10px 0;
  display: none;
  top: 28px;
  width: 150px;
  z-index: 50;
}
.dropdown-menu a {
  color: black;
  padding: 8px 12px;
  display: block;
 }
.dropdown:hover .dropdown-menu {
  display: block;
}





.user-actions{
  display: flex;
  align-items: center;
  gap: 12px;
}

.action-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 16px;
  background: #ffffff;
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  font-size: 14px;
  cursor: pointer;
  transition: 0.2s ease-in-out;
}

.action-btn svg {
  margin: 0;
}

.action-btn:hover {
  background: #f5f5f5;
  transform: translateY(-1px);
  box-shadow: 0 3px 6px rgba(0,0,0,0.08);
}

.action-btn:active {
  transform: translateY(0px);
  box-shadow: none;
}

.user-actions button:hover {
  background-color: #f0f9f4;
  /* color: #339e6a; */
}

.Category:hover {
  margin-left: 10%;
  font-size: large;
  color: #3bb77e;
  font-weight: bold;
  cursor: pointer;
}

.categories-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 20px 0;
}

.categories-row .Category h2 {
  cursor: pointer;
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
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
  justify-items: center;
  margin-bottom: 5%;
}
</style>
