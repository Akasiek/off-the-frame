<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import Table from '@/Components/Product/Dashboard/Table.vue';
import { Product, ProductCategory } from '@/Interfaces';

defineProps<{
  products: { data: Product[] };
  categories: ProductCategory[];
}>();
</script>

<template>
  <Head title="Produkty" />

  <DashboardLayout header-title="Ustawienia produktów" header-subtext="Tutaj możesz zarządzać produktami.">
    <Table :products="products" :categories="categories" />
  </DashboardLayout>
</template>
