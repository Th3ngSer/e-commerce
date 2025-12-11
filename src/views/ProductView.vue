<template>
  <AppHeader />
  <ProductDetail v-if="productData" :product="productData" />
  <div v-else class="loading">Loading product...</div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import AppHeader from '@/component/AppHeader.vue';
import ProductDetail from '@/component/ProductDetail.vue';
import Apple from '../assets/img/apple.png'
import Banana from '../assets/img/banana.png'
import Peach from '../assets/img/peach.png'
import Salad from '../assets/img/salad.png'
import Cake from '../assets/img/cake.png'
import Pizza from '../assets/img/pizza.png'
import Burger from '../assets/img/burger.png'
import Onion from '../assets/img/onion.png'

const route = useRoute()

// Mock product database
const productsDB = [
  {
    id: 1,
    name: 'Red Apple',
    brand: 'Fresh Farms',
    description: 'Fresh and crispy red apples, perfect for snacking or baking. Rich in fiber and vitamin C.',
    fullDescription: 'These premium red apples are handpicked from organic farms, ensuring the highest quality and taste. Packed with antioxidants and nutrients, they make a healthy addition to your daily diet. Store in a cool place for best freshness.',
    price: 3.99,
    originalPrice: 4.99,
    rating: 4.5,
    reviewCount: 25,
    images: [Apple, Apple, Apple],
    inStock: true,
    vendor: 'Fresh Farms',
    sku: 'FF-APPLE-001',
    category: 'Fruits',
    additionalInfo: {
      'Weight': '1 kg',
      'Origin': 'Organic Farm',
      'Shelf Life': '2 weeks'
    }
  },
  {
    id: 2,
    name: 'Ripe Bananas',
    brand: 'Tropical Fruits',
    description: 'Sweet and ripe bananas, great source of potassium and energy.',
    fullDescription: 'Our bananas are imported from tropical regions and ripened to perfection. They are naturally sweet and packed with essential nutrients including potassium, vitamin B6, and fiber. Perfect for smoothies, desserts, or as a quick snack.',
    price: 2.49,
    originalPrice: 3.49,
    rating: 4.2,
    reviewCount: 18,
    images: [Banana, Banana, Banana],
    inStock: true,
    vendor: 'Tropical Fruits',
    sku: 'TF-BAN-002',
    category: 'Fruits',
    additionalInfo: {
      'Weight': '1.5 kg',
      'Origin': 'Ecuador',
      'Shelf Life': '5 days'
    }
  },
  {
    id: 3,
    name: 'Juicy Peaches',
    brand: 'Orchard Fresh',
    description: 'Succulent and juicy peaches with a sweet flavor.',
    fullDescription: 'Handpicked from our premium orchards, these peaches are bursting with natural sweetness and juice. Rich in vitamins A and C, they support immune health and skin vitality. Enjoy them fresh or use in your favorite recipes.',
    price: 4.29,
    originalPrice: 5.29,
    rating: 4.7,
    reviewCount: 32,
    images: [Peach, Peach, Peach],
    inStock: true,
    vendor: 'Orchard Fresh',
    sku: 'OF-PCH-003',
    category: 'Fruits',
    additionalInfo: {
      'Weight': '1 kg',
      'Origin': 'California',
      'Shelf Life': '1 week'
    }
  },
  {
    id: 4,
    name: 'Fresh Salad Mix',
    brand: 'Green Valley',
    description: 'Crisp and fresh salad greens, perfect for healthy meals.',
    fullDescription: 'Our premium salad mix contains a variety of fresh greens including lettuce, spinach, and arugula. Washed and ready to eat, it\'s the perfect base for nutritious salads. High in vitamins and minerals while being low in calories.',
    price: 2.99,
    originalPrice: 3.99,
    rating: 4.3,
    reviewCount: 15,
    images: [Salad, Salad, Salad],
    inStock: true,
    vendor: 'Green Valley',
    sku: 'GV-SLD-004',
    category: 'Vegetables',
    additionalInfo: {
      'Weight': '500 g',
      'Origin': 'Local Farm',
      'Shelf Life': '3 days'
    }
  },
  {
    id: 5,
    name: 'Chocolate Cake',
    brand: 'Sweet Treats',
    description: 'Rich and moist chocolate cake, perfect for celebrations.',
    fullDescription: 'Indulge in our decadent chocolate cake made with premium cocoa and the finest ingredients. Layered with smooth chocolate frosting, it\'s perfect for birthdays, celebrations, or treating yourself. Best served at room temperature.',
    price: 15.99,
    originalPrice: 19.99,
    rating: 4.8,
    reviewCount: 42,
    images: [Cake, Cake, Cake],
    inStock: true,
    vendor: 'Sweet Treats Bakery',
    sku: 'ST-CAKE-005',
    category: 'Bakery',
    additionalInfo: {
      'Weight': '750 g',
      'Serves': '6-8 people',
      'Shelf Life': '5 days refrigerated'
    }
  },
  {
    id: 6,
    name: 'Margherita Pizza',
    brand: 'Italiano',
    description: 'Classic Italian pizza with fresh mozzarella and basil.',
    fullDescription: 'Authentic Margherita pizza featuring a thin crispy crust topped with San Marzano tomato sauce, fresh mozzarella, and aromatic basil. Made using traditional Italian methods for an authentic taste experience. Simply heat and enjoy!',
    price: 8.49,
    originalPrice: 10.49,
    rating: 4.6,
    reviewCount: 28,
    images: [Pizza, Pizza, Pizza],
    inStock: true,
    vendor: 'Italiano Foods',
    sku: 'IT-PZA-006',
    category: 'Fast Food',
    additionalInfo: {
      'Weight': '300 g',
      'Origin': 'Italy',
      'Preparation': 'Oven bake 10 min at 200°C'
    }
  },
  {
    id: 7,
    name: 'Beef Burger',
    brand: 'Fast Bites',
    description: 'Juicy beef burger with fresh toppings and special sauce.',
    fullDescription: 'Our signature beef burger features a premium beef patty grilled to perfection, topped with crisp lettuce, ripe tomatoes, onions, pickles, and our special house sauce. Served on a toasted sesame seed bun. A satisfying meal any time of day.',
    price: 5.99,
    oldPrice: 7.49,
    rating: 4.4,
    reviewCount: 36,
    images: [Burger, Burger, Burger],
    inStock: true,
    vendor: 'Fast Bites',
    sku: 'FB-BRG-007',
    category: 'Fast Food',
    additionalInfo: {
      'Weight': '250 g',
      'Calories': '650 kcal',
      'Best consumed': 'Fresh'
    }
  },
  {
    id: 8,
    name: 'Fresh Onions',
    brand: 'Veggie World',
    description: 'Fresh and aromatic onions for cooking.',
    fullDescription: 'Premium quality onions sourced from local farms. These versatile vegetables are essential in countless recipes, adding depth and flavor to your cooking. Rich in antioxidants and vitamins. Store in a cool, dry place.',
    price: 1.99,
    originalPrice: 2.49,
    rating: 4.1,
    reviewCount: 12,
    images: [Onion, Onion, Onion],
    inStock: true,
    vendor: 'Veggie World',
    sku: 'VW-ONI-008',
    category: 'Vegetables',
    additionalInfo: {
      'Weight': '1 kg',
      'Origin': 'Local Farm',
      'Shelf Life': '2 months'
    }
  }
]

const productData = ref<any>(null)

onMounted(() => {
  const productId = Number(route.params.id)
  productData.value = productsDB.find(p => p.id === productId)

  if (!productData.value) {
    console.warn('Product not found, using default')
    productData.value = productsDB[0]
  }
})
</script>

<style scoped>
.loading {
  text-align: center;
  padding: 40px;
  font-size: 18px;
  color: #666;
}
</style>

<style scoped></style>
