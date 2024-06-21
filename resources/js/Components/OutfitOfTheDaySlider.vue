<script setup lang="ts">
import Flicking from '@egjs/vue3-flicking';
import { Arrow } from '@egjs/flicking-plugins';
import '@egjs/flicking-plugins/dist/arrow.css';

import Card from '@/Components/OutfitOfTheDay/Card.vue';
import { OutfitOfTheDay } from '@/Interfaces';

defineProps<{
  outfitsOfTheDay: OutfitOfTheDay[];
}>();

const plugins = [new Arrow()];
</script>

<template>
  <div class="relative max-w-6xl mx-auto">
    <Flicking :options="{ align: 'prev', preventClickOnDrag: true }" :plugins="plugins" class="flicking-wrapper">
      <div v-for="outfit in outfitsOfTheDay" class="h-auto card-panel mr-12 my-1" :key="outfit.id">
        <Card :outfit-of-the-day="outfit" />
      </div>

      <template #viewport>
        <span class="flicking-arrow-prev"></span>
        <span class="flicking-arrow-next"></span>
      </template>
    </Flicking>

    <div class="absolute inset-y-0 right-0 w-16 eased-gradient pointer-events-none z-10" />
  </div>
</template>
