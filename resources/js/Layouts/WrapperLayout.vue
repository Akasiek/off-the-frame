<script setup lang="ts">
import { Toaster } from '@/Components/ui/toast';
import { changeTheme, getTheme } from '@/lib/utils';
import { onMounted } from 'vue';

// Get system or preferred theme
onMounted(() => {
  changeTheme(getTheme());
});
</script>

<template>
  <Toaster />

  <slot />
</template>
