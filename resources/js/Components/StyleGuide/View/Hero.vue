<script setup lang="ts">
import { StyleGuide } from '@/Interfaces';

defineProps<{
  styleGuide: StyleGuide;
}>();
</script>

<template>
  <header class="py-8 bg-white-0 xl:rounded-[4rem] rounded-3xl shadow-[0_0_24px_4px_#00000008]">
    <div
      class="max-w-5xl mx-auto grid lg:grid-cols-[4fr_5fr] md:grid-cols-[5fr_4fr] sm:grid-cols-[6fr_4fr] grid-cols-1 my-4 gap-x-4 lg:px-8 md:px-6 px-4"
    >
      <div class="lg:p-6 md:p-4 p-2 h-full overflow-hidden">
        <img :src="styleGuide.image" :alt="`${styleGuide.name} image`" class="rounded-2xl h-full w-full object-center object-cover" />
      </div>

      <div class="flex flex-col justify-center md:gap-y-4 gap-y-2">
        <h1 class="font-serif font-medium lg:text-7xl md:text-6xl xs:text-4xl text-3xl">
          {{ styleGuide.name }}
        </h1>

        <p class="text-justify lg:text-base xs:text-sm text-xs">
          {{ styleGuide.description }}
        </p>
      </div>
    </div>
  </header>
</template>
