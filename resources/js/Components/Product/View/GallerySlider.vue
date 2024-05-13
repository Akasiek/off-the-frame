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
`

<template>
  <div class="xl:pl-8 xl:py-6 xl:pr-4 lg:pl-7 lg:py-6 lg:pr-2 pl-5 py-5 pr-5">
    <Flicking
      :options="{ circular: false, align: 'center', panelsPerView: 1, inputType: ['pointer'], preventClickOnDrag: true }"
      class="h-[30rem]"
      :plugins="plugins"
    >
      <div
        v-for="(image, index) in product.images"
        :key="index"
        class="card-panel h-full w-full flex items-center overflow-hidden rounded-3xl"
      >
        <img
          :src="image.url"
          :alt="`${product.brand} - ${product.model} - ${index}`"
          class="w-fit h-fit aspect-auto pointer-events-none rounded-3xl"
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
