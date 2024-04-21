<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ProductCategory } from '@/Interfaces';
import { ProductCategoryTable } from '@/Components/ProductCategory/Dashboard';

defineProps<{
  categories: { data: ProductCategory[] };
}>();
</script>

<template>
  <Head title="Kategorie produktów" />

  <DashboardLayout header-title="Ustawienia kategorii produktów" header-subtext="Tutaj możesz zarządzać kategoriami produktów.">
    <ProductCategoryTable :categories="categories" />
  </DashboardLayout>
</template>
