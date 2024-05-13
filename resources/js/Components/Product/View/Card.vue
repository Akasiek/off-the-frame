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
    class="max-w-64 w-full h-full bg-white-0 py-5 px-5 rounded-2xl border flex flex-col justify-between gap-y-4"
  >
    <div class="h-full flex items-center justify-center">
      <img :src="product.images[0].url" :alt="product.model" class="w-auto h-auto rounded-xl" />
    </div>

    <div class="grid grid-cols-[1fr_auto] gap-x-4 items-center">
      <div class="truncate">
        <h1 class="font-extrabold lg:text-base text-sm truncate" :title="product.model">
          {{ product.model }}
        </h1>
        <h2 class="font-semibold lg:text-sm text-xs truncate" :title="product.brand">
          {{ product.brand }}
        </h2>
      </div>

      <div v-if="product.links.length > 0">
        <span class="font-extrabold lg:text-base text-sm"> ${{ smallestPrice }} </span>
      </div>
    </div>
  </a>
</template>
