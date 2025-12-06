<template>
  <div class="product-detail">
    <div class="breadcrumb">
      <span>Home</span>
      <span class="separator">›</span>
      <span>{{ breadcrumbCategory }}</span>
      <span class="separator">›</span>
      <span class="active">{{ product.name }}</span>
    </div>

    <div class="product-container">
      <!-- Left: Image Gallery -->
      <div class="image-section">
        <div class="main-image">
          <img :src="selectedImage" :alt="product.name" />
        </div>
        <div class="thumbnail-gallery">
          <button v-for="(img, index) in product.images" :key="index" @click="selectedImage = img"
            :class="['thumbnail', { active: selectedImage === img }]">
            <img :src="img" :alt="`${product.name} view ${index + 1}`" />
          </button>
        </div>
      </div>

      <!-- Right: Product Details -->
      <div class="details-section">
        <div class="stock-badge" :class="product.inStock ? 'in-stock' : 'out-stock'">
          {{ product.inStock ? 'In Stock' : 'Out of Stock' }}
        </div>

        <h1 class="product-name">{{ product.name }}</h1>

        <div class="rating">
          <div class="stars">
            <span v-for="i in 5" :key="i" class="star" :class="{ filled: i <= Math.floor(product.rating) }">★</span>
          </div>
          <span class="rating-count">({{ product.reviewCount }})</span>
        </div>

        <div class="price-section">
          <span class="current-price">${{ product.price.toFixed(2) }}</span>
          <span class="original-price" v-if="product.originalPrice">${{ product.originalPrice.toFixed(2) }}</span>
        </div>

        <p class="description">{{ product.description }}</p>

        <div class="actions">
          <div class="quantity-selector">
            <button @click="decreaseQuantity" :disabled="quantity <= 1">−</button>
            <input type="number" v-model.number="quantity" min="1" />
            <button @click="increaseQuantity">+</button>
          </div>

          <button class="add-to-cart-btn" @click="addToCart">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 6h15l-1.5 9h-12z"></path>
              <circle cx="9" cy="20" r="1"></circle>
              <circle cx="18" cy="20" r="1"></circle>
            </svg>
            Add To Cart
          </button>

          <button class="icon-btn wishlist-btn" @click="toggleWishlist" :class="{ active: isWishlisted }">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
              :fill="isWishlisted ? 'currentColor' : 'none'" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8z">
              </path>
            </svg>
          </button>

          <button class="icon-btn share-btn" @click="shareProduct">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="18" cy="5" r="3"></circle>
              <circle cx="6" cy="12" r="3"></circle>
              <circle cx="18" cy="19" r="3"></circle>
              <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
              <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
            </svg>
          </button>
        </div>

        <div class="product-meta">
          <div class="meta-item">
            <span class="label">Vendor:</span>
            <span class="value">{{ product.vendor }}</span>
          </div>
          <div class="meta-item">
            <span class="label">SKU:</span>
            <span class="value">{{ product.sku }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabs Section -->
    <div class="tabs-section">
      <div class="tabs-header">
        <button v-for="tab in tabs" :key="tab.id" @click="activeTab = tab.id"
          :class="['tab-btn', { active: activeTab === tab.id }]">
          {{ tab.label }}
        </button>
      </div>
      <div class="tab-content">
        <div v-if="activeTab === 'description'" class="tab-pane">
          <p>{{ product.fullDescription }}</p>
        </div>
        <div v-if="activeTab === 'additional'" class="tab-pane">
          <table class="info-table">
            <tr v-for="(value, key) in product.additionalInfo" :key="key">
              <td class="info-label">{{ key }}</td>
              <td class="info-value">{{ value }}</td>
            </tr>
          </table>
        </div>
        <div v-if="activeTab === 'reviews'" class="tab-pane">
          <p>Reviews ({{ product.reviewCount }})</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'

const props = defineProps < {
  product: {
    id: number | string
    name: string
    description: string
    fullDescription: string
    price: number
    originalPrice?: number
    rating: number
    reviewCount: number
    images: string[]
    inStock: boolean
    vendor: string
    sku: string
    category?: string
    additionalInfo?: Record < string, string>
  }
}> ()

const quantity = ref(1)
const selectedImage = ref(props.product.images[0])
const isWishlisted = ref(false)
const activeTab = ref('description')

const tabs = [
  { id: 'description', label: 'Description' },
  { id: 'additional', label: 'Additional Info' },
  { id: 'reviews', label: `Reviews (${props.product.reviewCount})` }
]

const breadcrumbCategory = computed(() => {
  return props.product.category || 'Products'
})

function increaseQuantity() {
  quantity.value++
}

function decreaseQuantity() {
  if (quantity.value > 1) {
    quantity.value--
  }
}

function addToCart() {
  alert(`Added ${quantity.value} x ${props.product.name} to cart`)
}

function toggleWishlist() {
  isWishlisted.value = !isWishlisted.value
}

function shareProduct() {
  if (navigator.share) {
    navigator.share({
      title: props.product.name,
      text: props.product.description,
      url: window.location.href
    })
  } else {
    alert('Share: ' + props.product.name)
  }
}
</script>

<style scoped>
.product-detail {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  font-family: 'Courier New', Courier, monospace;
}

.breadcrumb {
  font-size: 14px;
  color: #666;
  margin-bottom: 20px;
}

.breadcrumb .separator {
  margin: 0 8px;
}

.breadcrumb .active {
  color: #333;
  font-weight: 600;
}

.product-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-bottom: 40px;
}

/* Image Section */
.image-section {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.main-image {
  border: 2px solid #e0e0e0;
  border-radius: 12px;
  padding: 20px;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 400px;
}

.main-image img {
  max-width: 100%;
  max-height: 400px;
  object-fit: contain;
}

.thumbnail-gallery {
  display: flex;
  gap: 12px;
}

.thumbnail {
  width: 80px;
  height: 80px;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  padding: 8px;
  background: #fff;
  cursor: pointer;
  transition: all 0.2s ease;
}

.thumbnail:hover,
.thumbnail.active {
  border-color: #3bb77e;
}

.thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

/* Details Section */
.details-section {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.stock-badge {
  display: inline-block;
  padding: 4px 12px;
  border-radius: 4px;
  font-size: 12px;
  font-weight: bold;
  width: fit-content;
}

.stock-badge.in-stock {
  background: #d4f5e1;
  color: #3bb77e;
}

.stock-badge.out-stock {
  background: #ffe0e0;
  color: #e74c3c;
}

.product-name {
  font-size: 28px;
  font-weight: 700;
  color: #253d4e;
  margin: 0;
}

.rating {
  display: flex;
  align-items: center;
  gap: 8px;
}

.stars {
  display: flex;
}

.star {
  color: #d0d0d0;
  font-size: 18px;
}

.star.filled {
  color: #ffc107;
}

.rating-count {
  color: #777;
  font-size: 14px;
}

.price-section {
  display: flex;
  align-items: center;
  gap: 12px;
}

.current-price {
  font-size: 32px;
  font-weight: bold;
  color: #3bb77e;
}

.original-price {
  font-size: 20px;
  color: #adadad;
  text-decoration: line-through;
}

.description {
  color: #666;
  line-height: 1.6;
  margin: 8px 0;
}

.actions {
  display: flex;
  gap: 12px;
  align-items: center;
  margin-top: 20px;
}

.quantity-selector {
  display: flex;
  align-items: center;
  border: 2px solid #e0e0e0;
  border-radius: 8px;
  overflow: hidden;
}

.quantity-selector button {
  width: 40px;
  height: 44px;
  border: none;
  background: #f5f5f5;
  cursor: pointer;
  font-size: 18px;
  color: #333;
  transition: background 0.2s ease;
}

.quantity-selector button:hover:not(:disabled) {
  background: #e0e0e0;
}

.quantity-selector button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.quantity-selector input {
  width: 60px;
  height: 44px;
  border: none;
  text-align: center;
  font-size: 16px;
  font-weight: 600;
}

.quantity-selector input::-webkit-outer-spin-button,
.quantity-selector input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.add-to-cart-btn {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 24px;
  background: #3bb77e;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.add-to-cart-btn:hover {
  background: #339e6a;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(59, 183, 126, 0.3);
}

.icon-btn {
  width: 44px;
  height: 44px;
  border: 2px solid #e0e0e0;
  background: white;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s ease;
  color: #666;
}

.icon-btn:hover {
  border-color: #3bb77e;
  color: #3bb77e;
}

.wishlist-btn.active {
  background: #ffe0e0;
  border-color: #e74c3c;
  color: #e74c3c;
}

.product-meta {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid #e0e0e0;
}

.meta-item {
  display: flex;
  gap: 8px;
}

.meta-item .label {
  font-weight: 600;
  color: #666;
}

.meta-item .value {
  color: #999;
}

/* Tabs Section */
.tabs-section {
  margin-top: 40px;
  border-top: 1px solid #e0e0e0;
}

.tabs-header {
  display: flex;
  gap: 8px;
  border-bottom: 2px solid #e0e0e0;
}

.tab-btn {
  padding: 12px 24px;
  background: transparent;
  border: none;
  border-bottom: 3px solid transparent;
  cursor: pointer;
  font-size: 15px;
  font-weight: 600;
  color: #666;
  transition: all 0.2s ease;
}

.tab-btn:hover {
  color: #3bb77e;
}

.tab-btn.active {
  color: #3bb77e;
  border-bottom-color: #3bb77e;
}

.tab-content {
  padding: 24px 0;
}

.tab-pane {
  color: #666;
  line-height: 1.8;
}

.info-table {
  width: 100%;
  border-collapse: collapse;
}

.info-table tr {
  border-bottom: 1px solid #e0e0e0;
}

.info-table td {
  padding: 12px 0;
}

.info-label {
  font-weight: 600;
  color: #333;
  width: 200px;
}

.info-value {
  color: #666;
}

@media (max-width: 768px) {
  .product-container {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .actions {
    flex-wrap: wrap;
  }

  .add-to-cart-btn {
    width: 100%;
  }
}
</style>
