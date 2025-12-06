<template>
  <Header />
  <ProductDetail :product="productData" />
</template>

<script setup lang="ts">
import Header from '@/component/Header.vue';
import ProductDetail from '@/component/ProductDetail.vue';

const productData = {
  id: 1,
  name: 'Seeds of Change Organic Quinoa, Brown',
  description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
  fullDescription: 'Detailed description here...',
  price: 38,
  originalPrice: 42,
  rating: 4,
  reviewCount: 25,
  images: [
    '/path/to/main-image.png',
    '/path/to/image2.png',
    '/path/to/image3.png',
  ],
  inStock: true,
  vendor: 'NestMart',
  sku: 'FWM15VKT',
  category: 'Vegetables & tubers',
  additionalInfo: {
    'Weight': '1 kg',
    'Origin': 'Organic Farm',
    'Shelf Life': '6 months'
  }
}
</script>

<style scoped></style>
