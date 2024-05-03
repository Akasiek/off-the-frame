<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { OutfitOfTheDay, Product } from '@/Interfaces';
import { OutfitOfTheDayTable } from '@/Components/OutfitOfTheDay/Dashboard';

defineProps<{
  outfitsOfTheDay: { data: OutfitOfTheDay[] };
  products: Product[];
}>();
</script>

<template>
  <Head title="Outfits of the Day" />

  <DashboardLayout
    title="Ustawienia Outfits of the Day"
    header-title="Ustawienia Outfits of the Day"
    header-subtext="Tutaj możesz zarządzać Outfits of the Day"
  >
    <OutfitOfTheDayTable :products="products" :outfits-of-the-day="outfitsOfTheDay" />
  </DashboardLayout>
</template>
