<template>
  <div class="promo-card" :style="{ backgroundColor: bgColor }">
    <div class="promo-content">
      <h2 class="promo-title">{{ title }}</h2>
      <button class="promo-btn" :style="{ backgroundColor: btnColor }" @click="shopNow">
        {{ btnText }} →
      </button>
    </div>
    <img :src="image" :alt="title" class="promo-image" />
  </div>
</template>

<script setup lang="ts">
type Props = {
  title: string
  btnText?: string
  image?: string
  bgColor?: string
  btnColor?: string
}

const props = defineProps<Props>()

const title = props.title
const btnText = props.btnText ?? 'Shop Now'
const image = props.image
const bgColor = props.bgColor ?? '#fff'
const btnColor = props.btnColor ?? '#28a745'

function shopNow() {
  // simple alert using the promotion title
  alert(`Let's shop: ${props.title}`)
}
</script>

<style scoped>
.promo-card {
  width: 340px;
  height: 150px;
  border-radius: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease;
}

.promo-card:hover {
  transform: translateY(-4px);
}

.promo-content {
  flex: 1;
}

.promo-title {
  font-size: 16px;
  color: #333;
  margin: 0 0 12px 0;
}

.promo-btn {
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 6px 12px;
  cursor: pointer;
  font-size: 13px;
  transition: background 0.2s ease;
}

.promo-btn:hover {
  opacity: 0.9;
}

.promo-image {
  width: 100px;
  height: auto;
  object-fit: contain;
}
</style>
