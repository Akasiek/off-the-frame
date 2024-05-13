<script setup lang="ts">
import { ProductLink } from '@/Interfaces/ProductLink';

defineProps<{
  link: ProductLink;
}>();
</script>

<template>
  <a
    :href="link.url"
    class="block w-fit text-black font-medium lg:py-2.5 md:py-2 py-1.5 lg:px-5 md:px-4 px-3.5 rounded-full lg:shadow-lg shadow-md border lg:text-base md:text-sm text-xs"
    target="_blank"
  >
    {{ link.store }}
    <span class="font-extrabold ml-2">${{ link.price }}</span>
  </a>
</template>
