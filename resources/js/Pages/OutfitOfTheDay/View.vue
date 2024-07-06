<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import { OutfitOfTheDay } from '@/Interfaces';
import Hero from '@/Components/OutfitOfTheDay/View/Hero.vue';
import ProductGrid from '@/Components/Product/ProductGrid.vue';

defineProps<{
  outfitOfTheDay: { data: OutfitOfTheDay };
}>();
</script>

<template>
  <PrimaryLayout :title="`${outfitOfTheDay.data.name}`">
    <Hero :outfit-of-the-day="outfitOfTheDay.data" />
    <ProductGrid :products="outfitOfTheDay.data.products" />
  </PrimaryLayout>
</template>
