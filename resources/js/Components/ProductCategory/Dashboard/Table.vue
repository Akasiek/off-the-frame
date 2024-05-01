<script setup lang="ts">
import { h } from 'vue';
import { ProductCategory } from '@/Interfaces';
import { ColumnDef } from '@tanstack/vue-table';
import { DataTable } from '@/Components/ui/table';
import DeleteDialog from '@/Components/DeleteDialog.vue';
import { ProductCategoryCreateForm, ProductCategoryUpdateForm } from '@/Components/ProductCategory/Form';

const { categories } = defineProps<{
  categories: { data: ProductCategory[] };
}>();

const columns: ColumnDef<ProductCategory>[] = [
  {
    accessorKey: 'name',
    header: 'Nazwa',
    cell: (props) => props.row.original.name,
  },
  {
    id: 'actions',
    header: 'Akcje',
    cell: (props) =>
      h('div', { class: 'space-x-2 min-w-14' }, [
        h(ProductCategoryUpdateForm, {
          category: props.row.original,
        }),
        h(DeleteDialog, {
          id: props.row.original.id,
          toastMessage: 'Kategoria została usunięta',
          routeName: 'product-categories.delete',
        }),
      ]),
  },
];
</script>

<template>
  <DataTable :data="categories.data" :columns="columns" class="z-10">
    <template #header>
      <div class="flex flex-wrap justify-between mb-4">
        <ProductCategoryCreateForm />
      </div>
    </template>
  </DataTable>
</template>
