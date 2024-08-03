<script setup lang="ts">
import { Toaster } from '@/Components/ui/toast';
import { Head } from '@inertiajs/vue3';

defineProps<{
  title: string;
  description?: string;
}>();
</script>

<template>
  <Head>
    <title>{{ title }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta name="description" :content="description" />
  </Head>

  <Toaster />

  <div class="text-black bg-white">
    <slot />
  </div>
</template>
