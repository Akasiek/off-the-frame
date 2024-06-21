<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import { StyleGuide } from '@/Interfaces';
import Hero from '@/Components/StyleGuide/View/Hero.vue';
import OutfitOfTheDaySlider from '@/Components/OutfitOfTheDaySlider.vue';
import Card from '@/Components/Product/View/Card.vue';

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

    <section
      class="mx-auto max-w-6xl grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-12 gap-y-8 xs:gap-x-4 gap-x-2 lg:py-12 md:py-10 py-6 lg:px-8 sm:px-4 px-2"
      v-if="styleGuide.data.products.length"
    >
      <template v-for="product in styleGuide.data.products">
        <Card :product="product" />
      </template>
    </section>
  </PrimaryLayout>
</template>
