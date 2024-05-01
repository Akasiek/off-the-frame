<script setup lang="ts">
import Flicking from '@egjs/vue3-flicking';
import { Product } from '@/Interfaces';
import { AutoPlay } from '@egjs/flicking-plugins';

const plugins = [new AutoPlay({ duration: 3000, direction: 'NEXT', stopOnHover: false })];

defineProps<{
  product: Product;
}>();
</script>

<template>
  <div class="relative w-full h-full pl-8 py-6 pr-6">
    <Flicking :options="{ circular: false, align: 'center', panelsPerView: 1 }" class="h-[30rem]" :plugins="plugins">
      <template v-for="(image, index) in product.images">
        <img
          :src="image.url"
          :alt="`${product.brand} - ${product.model} - ${index}`"
          class="h-full object-center object-cover rounded-3xl overflow-hidden"
        />
      </template>
    </Flicking>
  </div>
</template>
