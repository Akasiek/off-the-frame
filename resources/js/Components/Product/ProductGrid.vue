<script setup lang="ts">
import { Product } from '@/Interfaces';
import Card from '@/Components/Product/View/Card.vue';

defineProps<{
  products: Product[];
}>();
</script>

<template>
  <section
    class="mx-auto max-w-6xl grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-12 gap-y-8 xs:gap-x-4 gap-x-2 lg:py-12 md:py-10 py-6 lg:px-8 sm:px-4 px-2"
    v-if="products.length"
  >
    <template v-for="product in products">
      <Card :product="product" />
    </template>
  </section>
</template>
