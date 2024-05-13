<script setup lang="ts">
import { Product } from '@/Interfaces';
import LinkButton from '@/Components/Product/View/LinkButton.vue';
import GallerySlider from '@/Components/Product/View/GallerySlider.vue';

defineProps<{
  product: Product;
}>();
</script>

<template>
  <div
    class="bg-white-0 grid rounded-3xl border-2 overflow-hidden lg:gap-x-6 md:gap-x-4 gap-x-2 xl:grid-cols-[3fr_auto_4fr] lg:grid-cols-[1fr_auto_1fr] md:grid-cols-[5fr_auto_3fr] grid-cols-1"
  >
    <div class="overflow-hidden">
      <GallerySlider :product="product" />
    </div>
    <div class="border-r-2 h-3/4 my-auto md:block hidden" />

    <div class="my-auto md:px-0 md:mr-6 px-6">
      <h1 class="font-extrabold lg:text-5xl md:text-4xl text-3xl">
        {{ product.brand }}
      </h1>
      <h2 class="font-semibold lg:text-2xl md:text-xl text-lg">
        {{ product.model }}
      </h2>

      <div class="my-4 flex flex-wrap lg:gap-y-6 md:gap-y-4 gap-y-3 lg:gap-x-4 gap-x-2">
        <template v-for="link in product.links">
          <LinkButton :link="link" />
        </template>
      </div>

      <p class="font-serif lg:text-sm text-xs text-gray-400 lg:mt-12 mt-8 md:mb-0 mb-8">
        We earn a commission if you make a purchase, at no additional cost to you
      </p>
    </div>
  </div>
</template>
