<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import { OutfitOfTheDay } from '@/Interfaces';
import Hero from '@/Components/OutfitOfTheDay/View/Hero.vue';
import ProductGallery from '@/Components/ProductSlider.vue';

defineProps<{
  outfitOfTheDay: { data: OutfitOfTheDay };
}>();
</script>

<template>
  <PrimaryLayout :title="`${outfitOfTheDay.data.name}`">
    <Hero :outfit-of-the-day="outfitOfTheDay.data" />

    <section class="lg:py-20 md:py-16 py-12 lg:px-8 sm:px-4 px-2">
      <ProductGallery :products="outfitOfTheDay.data.products" />
    </section>
  </PrimaryLayout>
</template>
