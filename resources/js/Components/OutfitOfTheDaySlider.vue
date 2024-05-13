<script setup lang="ts">
import Flicking from '@egjs/vue3-flicking';
import Card from '@/Components/OutfitOfTheDay/Card.vue';
import { OutfitOfTheDay } from '@/Interfaces';

defineProps<{
  outfitsOfTheDay: OutfitOfTheDay[];
}>();
</script>

<template>
  <div class="relative max-w-6xl mx-auto">
    <Flicking :options="{ align: 'prev' }">
      <div v-for="outfit in outfitsOfTheDay" class="h-auto card-panel mr-12 my-1" :key="outfit.id">
        <Card :outfit-of-the-day="outfit" />
      </div>
    </Flicking>

    <div class="absolute inset-y-0 right-0 w-16 eased-gradient pointer-events-none z-10" />
  </div>
</template>
