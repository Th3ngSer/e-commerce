<template>
  <div class="Head-Compo" :style="{ backgroundColor: color }">
      <p class="Text_head">{{ title }}</p>
      <span>{{ navigation }}</span>
  </div>

</template>

<script setup lang="ts">

  const props = defineProps<{
    title: string
    navigation?: string
    color?: string
  }>()
  const title = props.title
  const navigation = props.navigation
  const color = props.color
</script>

<style scoped>
.Head-Compo {
  max-width: 80%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  /* background-color: var(--color, #b2e682); */
  padding: 40px 40px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  margin-bottom: 15px;
  border-radius: 12px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  color: #333;
  border-radius: 8px;
}

.Text_head {
  font-weight: bold;
  font-size: 1.2em;
  margin: 0;
}
</style>
