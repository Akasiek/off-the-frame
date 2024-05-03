<script setup lang="ts">
import Flicking from '@egjs/vue3-flicking';

import Card from '@/Components/Product/View/Card.vue';
import { Product } from '@/Interfaces';

defineProps<{
  products: Product[];
}>();
</script>

<template>
  <div class="relative max-w-6xl mx-auto">
    <Flicking :options="{ align: 'prev' }">
      <div v-for="product in products" class="h-auto card-panel mr-12">
        <Card :product="product" />
      </div>
    </Flicking>

    <div class="absolute inset-y-0 right-0 w-16 eased-gradient pointer-events-none z-10" />
  </div>
</template>

<style>
.eased-gradient {
  background: linear-gradient(
    to right,
    hsla(0, 0%, 98%, 0) 0%,
    hsla(0, 0%, 98%, 0.013) 8.1%,
    hsla(0, 0%, 98%, 0.049) 15.5%,
    hsla(0, 0%, 98%, 0.104) 22.5%,
    hsla(0, 0%, 98%, 0.175) 29%,
    hsla(0, 0%, 98%, 0.259) 35.3%,
    hsla(0, 0%, 98%, 0.352) 41.2%,
    hsla(0, 0%, 98%, 0.45) 47.1%,
    hsla(0, 0%, 98%, 0.55) 52.9%,
    hsla(0, 0%, 98%, 0.648) 58.8%,
    hsla(0, 0%, 98%, 0.741) 64.7%,
    hsla(0, 0%, 98%, 0.825) 71%,
    hsla(0, 0%, 98%, 0.896) 77.5%,
    hsla(0, 0%, 98%, 0.951) 84.5%,
    hsla(0, 0%, 98%, 0.987) 91.9%,
    hsl(0, 0%, 98%) 100%
  );
}
</style>
