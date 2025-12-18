<template>
  <Header />
  <CategoryHead v-if="selectedFood" :title="categoryTitle" :navigation="breadcrumb" :color="categoryColor" />
</template>
<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import CategoryHead from '@/component/CategoryHead.vue';
import Header from '@/component/AppHeader.vue';

const route = useRoute()

// Get query params from URL
const selectedFood = ref({
  id: route.query.id as string,
  name: route.query.name as string,
  category: route.query.category as string
})

// Category color mapping
const categoryColors: Record<string, string> = {
  'fastfood': '#f9d976',
  'dairy': '#b2e682',
  'vegetables': '#a8e6a3',
  'fruits': '#f6abb6',
  'snacks': '#f6abb6',
  'meat': '#ffb6b9',
  'seafood': '#84d2f6',
  'grains': '#e3c770'
}

// Format category name for display
const formatCategory = (cat: string) => {
  if (!cat) return 'Category'
  return cat.split(/(?=[A-Z])/).map(word =>
    word.charAt(0).toUpperCase() + word.slice(1)
  ).join(' ')
}

// Computed properties
const categoryTitle = computed(() => {
  return selectedFood.value.name || 'Category'
})

const breadcrumb = computed(() => {
  const category = formatCategory(selectedFood.value.category || '')
  const name = selectedFood.value.name || ''
  return `Home > ${category} > ${name}`
})

const categoryColor = computed(() => {
  return categoryColors[selectedFood.value.category || 'fastfood'] || '#f9d976'
})

// Update on route change
onMounted(() => {
  if (route.query.id) {
    selectedFood.value = {
      id: route.query.id as string,
      name: route.query.name as string,
      category: route.query.category as string
    }
  }
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

.search-bar {
  padding: 6px 10px;
  border: 1px solid #57c290;
  border-radius: 8px;
  width: 40%;
  display: flex;
}

.search {
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
  position: relative;
  /* needed for the absolute dropdown-menu */
  cursor: pointer;
  transition: background-color .18s ease, box-shadow .18s ease, transform .08s ease;
  user-select: none;
  min-width: 120px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
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
  box-shadow: 0 6px 18px rgba(87, 194, 144, 0.08);
  transform: translateY(-1px);
}

.dropdown:active {
  transform: translateY(0);
}

.dropdown:focus,
.dropdown:focus-visible {
  outline: none;
  box-shadow: 0 0 0 4px rgba(87, 194, 144, 0.12);
}

.dropdown-menu a:hover {
  display: block;
  background-color: #27ae60
}

.dropdown-menu {
  position: absolute;
  background: white;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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





.user-actions {
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
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
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
