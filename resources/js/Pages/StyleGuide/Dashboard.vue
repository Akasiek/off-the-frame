<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { OutfitOfTheDay, PaginatedMeta, Product, StyleGuide } from '@/Interfaces';
import { StyleGuideTable } from '@/Components/StyleGuide/Dashboard';

defineProps<{
  styleGuides: { data: StyleGuide[]; meta: PaginatedMeta };
  products: Product[];
  outfitsOfTheDay: OutfitOfTheDay[];
}>();
</script>

<template>
  <Head title="Style Guides" />

  <DashboardLayout
    title="Ustawienia Style Guides"
    header-title="Ustawienia Style Guides"
    header-subtext="Tutaj możesz zarządzać Style Guides"
  >
    <StyleGuideTable :products="products" :outfits-of-the-day="outfitsOfTheDay" :style-guides="styleGuides" />
  </DashboardLayout>
</template>
