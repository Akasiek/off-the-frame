<script setup lang="ts">
import Pagination from '@/Components/Pagination.vue';

defineProps<{
  total: number;
  perPage: number;
}>();
</script>

<template>
  <div class="w-full">
    <slot />

    <div class="mx-auto w-fit mt-8">
      <Pagination :total="total" :per-page="perPage" />
    </div>
  </div>
</template>
