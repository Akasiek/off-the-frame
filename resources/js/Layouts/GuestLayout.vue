<script setup lang="ts">
// Change theme to dark
import WrapperLayout from '@/Layouts/WrapperLayout.vue';
</script>

<template>
  <WrapperLayout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-zinc-100 dark:bg-zinc-900">
      <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-zinc-800 shadow-md overflow-hidden sm:rounded-lg">
        <slot />
      </div>
    </div>
  </WrapperLayout>
</template>
