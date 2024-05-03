<script setup lang="ts">
import { Product } from '@/Interfaces';
import LinkButton from '@/Components/Product/View/LinkButton.vue';
import GallerySlider from '@/Components/Product/View/GallerySlider.vue';

defineProps<{
  product: Product;
}>();
</script>

<template>
  <div class="grid grid-cols-[3fr_auto_4fr] rounded-3xl border-2 overflow-hidden gap-x-6">
    <div class="overflow-hidden">
      <GallerySlider :product="product" />
    </div>
    <div class="border-r-2 h-3/4 my-auto" />
    <div class="my-auto">
      <h1 class="text-5xl font-extrabold">
        {{ product.brand }}
      </h1>
      <h2 class="text-2xl font-semibold">
        {{ product.model }}
      </h2>

      <div class="my-4 flex flex-wrap gap-y-6 gap-x-4">
        <template v-for="link in product.links">
          <LinkButton :link="link" />
        </template>
      </div>

      <p class="font-serif text-sm text-gray-400 mt-12">We earn a commission if you make a purchase, at no additional cost to you</p>
    </div>
  </div>
</template>
