<template>
  <div class="food-card">
    <img :src="image" :alt="title" class="food-image" />
    <h3 class="food-title">{{ title }}</h3>
    <p class="food-items">{{ items }} items</p>
  </div>
</template>

<script setup lang="ts">
defineProps({
  image: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  items: {
    type: Number,
    default: 0,
  },
})
</script>

<style scoped>
.food-card {
  width: 120px;
  background-color: #f1f8e9; /* light green */
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
  padding: 16px;
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.food-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.food-image {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 8px;
}

.food-title {
  font-size: 15px;
  font-weight: 600;
  color: #333;
  margin: 0;
}

.food-items {
  font-size: 13px;
  color: #777;
  margin: 4px 0 0;
}
</style>
