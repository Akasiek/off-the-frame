<script setup lang="ts">
import { OutfitOfTheDay } from '@/Interfaces';

defineProps<{
  outfitOfTheDay: OutfitOfTheDay;
}>();
</script>

<template>
  <header class="lg:py-8 md:py-6 py-4 bg-white-0 xl:rounded-[4rem] rounded-3xl shadow-[0_0_24px_4px_#00000008]">
    <div class="max-w-5xl my-4 mx-auto grid lg:grid-cols-[4fr_5fr] md:grid-cols-[5fr_4fr] xs:grid-cols-[6fr_4fr] grid-cols-1 gap-4">
      <div class="lg:px-6 px-5 py-2 h-full overflow-hidden">
        <a :href="outfitOfTheDay.image_source_url" target="_blank">
          <img
            :src="outfitOfTheDay.image"
            :alt="outfitOfTheDay.image_source_url"
            class="rounded-2xl h-full max-h-[44rem] w-full object-center object-cover"
          />
        </a>
      </div>

      <div class="flex items-center justify-center">
        <h1 class="font-serif font-medium lg:text-6xl md:text-5xl xs:text-4xl text-2xl">
          {{ outfitOfTheDay.name }}
        </h1>
      </div>
    </div>
  </header>
</template>
