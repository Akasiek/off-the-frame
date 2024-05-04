<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import { StyleGuide } from '@/Interfaces';
import Hero from '@/Components/StyleGuide/View/Hero.vue';
import ProductSlider from '@/Components/ProductSlider.vue';
import OutfitOfTheDaySlider from '@/Components/OutfitOfTheDaySlider.vue';

defineProps<{
  styleGuide: { data: StyleGuide };
}>();
</script>

<template>
  <PrimaryLayout :title="styleGuide.data.name">
    <Hero :style-guide="styleGuide.data" />

    <section class="my-20" v-if="styleGuide.data.outfitsOfTheDay.length">
      <OutfitOfTheDaySlider :outfits-of-the-day="styleGuide.data.outfitsOfTheDay" />
    </section>

    <section class="my-20" v-if="styleGuide.data.products.length">
      <ProductSlider :products="styleGuide.data.products" />
    </section>
  </PrimaryLayout>
</template>
