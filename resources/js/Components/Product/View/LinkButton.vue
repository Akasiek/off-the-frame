<script setup lang="ts">
import { ProductLink } from '@/Interfaces/ProductLink';

defineProps<{
  link: ProductLink;
}>();
</script>

<template>
  <a :href="link.url" class="block w-fit text-black font-medium py-2.5 px-5 rounded-full shadow-lg border" target="_blank">
    {{ link.store }}
    <span class="font-extrabold ml-2">${{ link.price }}</span>
  </a>
</template>

<style scoped></style>
