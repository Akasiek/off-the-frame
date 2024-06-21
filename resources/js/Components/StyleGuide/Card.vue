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
    class="flex flex-col rounded-2xl overflow-hidden max-w-[28rem] w-full bg-white-0 border"
  >
    <div class="w-full lg:h-[36rem] md:h-[32rem] sm:h-96 xs:h-80 h-52 overflow-hidden rounded-2xl">
      <img :src="styleGuide.image" :alt="`${styleGuide.name} image`" class="w-full h-full object-center object-contain" />
    </div>

    <div>
      <h2 class="font-serif sm:text-2xl xs:text-xl text-lg py-5 text-center">
        {{ styleGuide.name }}
      </h2>
    </div>
  </a>
</template>
