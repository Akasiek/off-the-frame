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
    <Flicking :options="{ align: 'prev', inputType: ['pointer'] }">
      <div v-for="product in products" class="h-auto card-panel mr-12 my-1" :key="product.id">
        <Card :product="product" />
      </div>
    </Flicking>

    <div class="absolute inset-y-0 right-0 w-16 eased-gradient pointer-events-none z-10" />
  </div>
</template>
