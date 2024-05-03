<script setup lang="ts">
import Flicking from '@egjs/vue3-flicking';
import { Pagination } from '@egjs/flicking-plugins';
import '@egjs/flicking-plugins/dist/pagination.css';

import { Product } from '@/Interfaces';

const plugins = [new Pagination({ type: 'bullet' })];

defineProps<{
  product: Product;
}>();
</script>

<template>
  <div class="pl-8 py-6 pr-6">
    <Flicking :options="{ circular: false, align: 'center', panelsPerView: 1 }" class="h-[30rem]" :plugins="plugins">
      <div v-for="(image, index) in product.images" :key="index" class="card-panel h-full w-full rounded-3xl overflow-hidden">
        <img
          :src="image.url"
          :alt="`${product.brand} - ${product.model} - ${index}`"
          class="h-full w-full object-center object-cover pointer-events-none"
        />
      </div>

      <template #viewport>
        <div class="flicking-pagination mb-1" />
      </template>
    </Flicking>
  </div>
</template>

<style>
.flicking-pagination-bullet-active {
  background-color: #7a232f;
}
</style>
