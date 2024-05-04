<script setup lang="ts">
import { OutfitOfTheDay } from '@/Interfaces';

defineProps<{
  outfitOfTheDay: OutfitOfTheDay;
}>();
</script>

<template>
  <header class="py-8 bg-white-0 rounded-[4rem] shadow-[0_0_24px_4px_#00000008]">
    <div class="max-w-5xl mx-auto grid grid-cols-[4fr_5fr] my-4">
      <div class="p-6 h-full overflow-hidden">
        <a :href="outfitOfTheDay.image_source_url" target="_blank">
          <img
            :src="outfitOfTheDay.image"
            :alt="outfitOfTheDay.image_source_url"
            class="rounded-2xl h-full w-full object-center object-cover"
          />
        </a>
      </div>

      <div class="flex items-center justify-center">
        <h1 class="font-serif font-medium text-7xl">
          {{ outfitOfTheDay.name }}
        </h1>
      </div>
    </div>
  </header>
</template>
