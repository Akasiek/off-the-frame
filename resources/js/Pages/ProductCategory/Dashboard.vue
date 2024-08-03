<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { PaginatedMeta, ParentProductCategory, ProductCategory } from '@/Interfaces';
import { ProductCategoryTable } from '@/Components/ProductCategory/Dashboard';

defineProps<{
  categories: { data: ProductCategory[]; meta: PaginatedMeta };
  parentCategories: ParentProductCategory[];
}>();
</script>

<template>
  <Head title="Kategorie produktów" />

  <DashboardLayout
    title="Ustawienia kategorii produktów"
    header-title="Ustawienia kategorii produktów"
    header-subtext="Tutaj możesz zarządzać kategoriami produktów."
  >
    <ProductCategoryTable :categories="categories" :parentCategories="parentCategories" />
  </DashboardLayout>
</template>
