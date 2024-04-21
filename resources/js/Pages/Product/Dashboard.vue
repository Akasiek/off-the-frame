<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ProductTable } from '@/Components/Product/Dashboard';
import { Product, ProductCategory } from '@/Interfaces';

defineProps<{
  products: { data: Product[] };
  categories: ProductCategory[];
}>();
</script>

<template>
  <Head title="Produkty" />

  <DashboardLayout header-title="Ustawienia produktów" header-subtext="Tutaj możesz zarządzać produktami.">
    <ProductTable :products="products" :categories="categories" />
  </DashboardLayout>
</template>
