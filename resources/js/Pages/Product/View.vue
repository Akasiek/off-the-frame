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
    <main class="max-w-6xl mx-auto lg:px-8 md:px-6 px-4 md:mt-[12dvh] sm:mt-[8dvh] mt-[6dvh] mb-64 md:mb-32">
      <ViewCard :product="product.data" />
    </main>
  </PrimaryLayout>
</template>
