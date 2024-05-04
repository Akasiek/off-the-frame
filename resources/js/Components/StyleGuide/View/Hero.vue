<script setup lang="ts">
import { StyleGuide } from '@/Interfaces';

defineProps<{
  styleGuide: StyleGuide;
}>();
</script>

<template>
  <header class="py-8 bg-white-0 rounded-[4rem] shadow-[0_0_24px_4px_#00000008]">
    <div class="max-w-5xl mx-auto grid grid-cols-[4fr_5fr] my-4 gap-x-4">
      <div class="p-6 h-full overflow-hidden">
        <img :src="styleGuide.image" :alt="`${styleGuide.name} image`" class="rounded-2xl h-full w-full object-center object-cover" />
      </div>

      <div class="flex flex-col justify-center gap-y-4">
        <h1 class="font-serif font-medium text-7xl">
          {{ styleGuide.name }}
        </h1>

        <p class="text-justify">
          {{ styleGuide.description }}
        </p>
      </div>
    </div>
  </header>
</template>
