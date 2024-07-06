<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import { StyleGuide } from '@/Interfaces';
import Hero from '@/Components/StyleGuide/View/Hero.vue';
import OutfitOfTheDaySlider from '@/Components/OutfitOfTheDaySlider.vue';
import ProductGrid from '@/Components/Product/ProductGrid.vue';

defineProps<{
  styleGuide: { data: StyleGuide };
}>();
</script>

<template>
  <PrimaryLayout :title="styleGuide.data.name">
    <Hero :style-guide="styleGuide.data" />

    <section class="lg:py-12 md:py-10 py-6 lg:px-8 sm:px-4 px-2" v-if="styleGuide.data.outfitsOfTheDay.length">
      <OutfitOfTheDaySlider :outfits-of-the-day="styleGuide.data.outfitsOfTheDay" />
    </section>

    <ProductGrid :products="styleGuide.data.products" />
  </PrimaryLayout>
</template>
