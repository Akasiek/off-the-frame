<script setup lang="ts">
import { OutfitOfTheDay } from '@/Interfaces';

defineProps<{
  outfitOfTheDay: OutfitOfTheDay;
}>();
</script>

<template>
  <a
    :key="outfitOfTheDay.id"
    :href="route('outfits-of-the-day.show', outfitOfTheDay.id)"
    class="flex flex-col rounded-2xl overflow-hidden w-64 bg-white-0 border"
  >
    <div class="w-full h-96 overflow-hidden rounded-2xl">
      <img :src="outfitOfTheDay.image" :alt="outfitOfTheDay.image_source_url" class="w-full h-full object-center object-cover" />
    </div>

    <div>
      <h2 class="font-serif font-semibold text-2xl py-5 text-center">
        {{ outfitOfTheDay.name }}
      </h2>
    </div>
  </a>
</template>
