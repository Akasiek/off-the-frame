<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import { Product } from '@/Interfaces';
import ViewCard from '@/Components/Product/View/ViewCard.vue';

const { product } = defineProps<{
  product: { data: Product };
}>();
</script>

<template>
  <PrimaryLayout :title="`${product.data.brand} - ${product.data.model}`">
    <main class="max-w-6xl mx-auto mt-[12dvh] mb-64">
      <ViewCard :product="product.data" />
    </main>
  </PrimaryLayout>
</template>
