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
    <main class="max-w-6xl mx-auto min-h-screen mt-[12dvh]">
      <ViewCard :product="product.data" />
    </main>
  </PrimaryLayout>
</template>
