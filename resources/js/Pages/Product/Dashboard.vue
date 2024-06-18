<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ProductTable } from '@/Components/Product/Dashboard';
import { PaginatedMeta, Product, ProductCategory } from '@/Interfaces';

defineProps<{
  products: { data: Product[]; meta: PaginatedMeta };
  categories: ProductCategory[];
}>();
</script>

<template>
  <Head title="Produkty" />

  <DashboardLayout title="Ustawienia produktów" header-title="Ustawienia produktów" header-subtext="Tutaj możesz zarządzać produktami.">
    <ProductTable :products="products" :categories="categories" :total="products" />
  </DashboardLayout>
</template>
