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
    class="flex flex-col rounded-2xl overflow-hidden max-w-80 w-full bg-white-0 border"
  >
    <div class="w-full md:h-[32rem] sm:h-96 xs:h-80 h-72 overflow-hidden rounded-2xl">
      <img :src="outfitOfTheDay.image" :alt="outfitOfTheDay.image_source_url" class="w-full h-full object-center object-cover" />
    </div>

    <div>
      <h2 class="font-serif font-semibold md:text-xl xs:text-lg md:py-4 xs:py-3 py-2.5 text-center">
        {{ outfitOfTheDay.name }}
      </h2>
    </div>
  </a>
</template>
