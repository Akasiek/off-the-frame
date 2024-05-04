<script setup lang="ts">
import { StyleGuide } from '@/Interfaces';

defineProps<{
  styleGuide: StyleGuide;
}>();
</script>

<template>
  <a
    :key="styleGuide.id"
    :href="route('style-guides.show', styleGuide.id)"
    class="flex flex-col rounded-2xl overflow-hidden w-80 bg-white-0 border"
  >
    <div class="w-full h-96 overflow-hidden rounded-2xl">
      <img :src="styleGuide.image" :alt="`${styleGuide.name} image`" class="w-full h-full object-center object-cover" />
    </div>

    <div>
      <h2 class="font-serif font-semibold text-2xl py-5 text-center">
        {{ styleGuide.name }}
      </h2>
    </div>
  </a>
</template>
