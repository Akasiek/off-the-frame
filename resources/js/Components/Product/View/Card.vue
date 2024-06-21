<script setup lang="ts">
import { Product } from '@/Interfaces';
import { computed } from 'vue';

const { product } = defineProps<{
  product: Product;
}>();

const smallestPrice = computed(() =>
  product.links.length > 0
    ? product.links.reduce((smallest, link) => (link.price < smallest ? link.price : smallest), product.links[0].price)
    : 0
);
</script>

<template>
  <a
    :key="product.id"
    :href="route('products.show', product.id)"
    class="max-w-72 w-full h-full bg-white-0 sm:py-5 py-3 sm:px-5 px-3.5 sm:rounded-2xl rounded-xl border flex flex-col justify-between gap-y-4"
  >
    <div class="h-full flex items-center justify-center">
      <img :src="product.images[0].url" :alt="product.model" class="w-auto h-auto rounded-xl" />
    </div>

    <div class="grid grid-cols-[1fr_auto] sm:gap-x-4 gap-x-2 items-center">
      <div class="truncate">
        <h1 class="font-extrabold text-xs xs:text-sm lg:text-base truncate" :title="product.model">
          {{ product.model }}
        </h1>
        <h2 class="font-semibold text-xs lg:text-sm truncate" :title="product.brand">
          {{ product.brand }}
        </h2>
      </div>

      <div v-if="product.links.length > 0">
        <span class="font-extrabold lg:text-base text-sm"> ${{ smallestPrice }} </span>
      </div>
    </div>
  </a>
</template>
