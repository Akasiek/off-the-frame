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

    <section class="my-20">
      <ProductGallery :products="outfitOfTheDay.data.products" />
    </section>
  </PrimaryLayout>
</template>
