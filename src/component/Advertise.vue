<template>
  <div class="advertise-banner">
    <div class="advertise-content">
      <h2 class="advertise-title">{{ title }}</h2>
      <p class="advertise-text">{{ text }}</p>
      <!-- <button class="advertise-btn" @click="onShopNow">Shop Now</button> -->
      <div class="advertise-signup">
        <form @submit.prevent="onSignup">
          <input name="email" type="email" placeholder="Enter your email" required class="advertise-input"
            aria-label="Email for signup" />
          <button type="submit" class="advertise-signup-btn">Sign Up</button>
        </form>
      </div>
    </div>
    <img :src="image" :alt="title" class="advertise-image" />
  </div>
</template>

<script setup lang="ts">

const props = defineProps<{
  title: string
  text: string
  image?: string
  email?: string
}>()
const title = props.title
const text = props.text
const defaultImage = new URL('../assets/img/adapple.png', import.meta.url).href
const image = props.image ?? defaultImage
// const email = props.email

// const onShopNow = (): void => {
//   window.alert('Shop Now clicked')
// }

const onSignup = (event: Event): void => {
  const form = event.target as HTMLFormElement | null
  const emailInput = form?.elements.namedItem('email') as HTMLInputElement | null
  if (emailInput) {
    window.alert('Signed up: ' + emailInput.value)
  } else {
    window.alert('Signed up')
  }
}

</script>

<style scoped>
.advertise-banner {
  /* width: 80%; */
  max-width: 70%;
  height: 20%;
  display: flex;
  gap: 20px;
  margin-top: 20px;
  margin-left: auto;
  margin-right: auto;
  align-items: center;
  justify-content: space-around;
  background-color: #9CC6DB;
  padding: 20px 50px;
  border: 1px solid #9c8d8d;
  border-radius: 8px;

}

.advertise-content {
  max-width: 60%;
}

.advertise-title {
  max-width: 70%;
  font-size: 30px;
  font-weight: bold;
  margin-bottom: 10px;
}

.advertise-text {
  font-size: 16px;
  margin-bottom: 20px;
}

.advertise-btn {
  background-color: #27ae60;
  color: white;
  border: none;
  border-radius: 15px;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
}

.advertise-btn:hover {
  background-color: #19b058;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  font-weight: bold;
}

.advertise-image {
  max-width: 25%;
  height: 20%;
  border-radius: 8px;
}

.advertise-signup {
  max-width: 400px;
  margin-top: 20px;
}

.advertise-signup form {
  display: flex;
  align-items: stretch;
  background-color: #ffffff;
  border-radius: 50px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.advertise-input {
  flex: 1;
  padding: 12px 20px;
  border: none;
  background-color: transparent;
  font-size: 14px;
  font-family: 'Courier New', Courier, monospace;
  outline: none;
  color: #333;
}

.advertise-input:focus {
  outline: none;
}

.advertise-input::placeholder {
  color: #999;
}

.advertise-signup-btn {
  padding: 12px 28px;
  background-color: #3bb77e;
  color: white;
  border: none;
  border-radius: 50px;
  font-size: 14px;
  font-family: 'Courier New', Courier, monospace;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  white-space: nowrap;
  margin: 4px;
}

.advertise-signup-btn:hover {
  background-color: #339e6a;
  box-shadow: 0 4px 12px rgba(59, 183, 126, 0.3);
  transform: translateY(-2px);
}

.advertise-signup-btn:active {
  transform: translateY(0);
  box-shadow: 0 2px 6px rgba(59, 183, 126, 0.3);
}
</style>
