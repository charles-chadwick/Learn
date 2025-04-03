<script setup>
import { ref } from 'vue';
const counter = ref(0);

</script>
<template>
<main class="m-6">
  <slot></slot>
</main>
</template>