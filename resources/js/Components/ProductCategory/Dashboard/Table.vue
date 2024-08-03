<script setup lang="ts">
import { h } from 'vue';
import { PaginatedMeta, ParentProductCategory, ProductCategory } from '@/Interfaces';
import { ColumnDef } from '@tanstack/vue-table';
import { DataTable } from '@/Components/ui/table';
import DeleteDialog from '@/Components/DeleteDialog.vue';
import { ProductCategoryCreateForm, ProductCategoryUpdateForm } from '@/Components/ProductCategory/Form';

const { categories, parentCategories } = defineProps<{
  categories: { data: ProductCategory[]; meta: PaginatedMeta };
  parentCategories: ParentProductCategory[];
}>();

const columns: ColumnDef<ProductCategory>[] = [
  {
    accessorKey: 'name',
    header: 'Nazwa',
    cell: (props) => (!props.row.original.parent ? h('b', props.row.original.name) : props.row.original.name),
  },
  {
    accessorKey: 'order_position',
    header: 'Pozycja',
    cell: (props) =>
      props.row.original.parent
        ? props.row.original.parent.order_position + ' ➡️ ' + props.row.original.order_position
        : props.row.original.order_position,
  },
  {
    accessorKey: 'parent_id',
    header: 'Kategoria nadrzędna',
    cell: (props) => (props.row.original.parent ? props.row.original.parent.name : 'Brak'),
  },
  {
    id: 'actions',
    header: 'Akcje',
    cell: (props) =>
      h('div', { class: 'space-x-2 min-w-14' }, [
        h(ProductCategoryUpdateForm, {
          category: props.row.original,
          parentCategories: parentCategories,
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
  <DataTable :data="categories.data" :columns="columns" :meta="categories.meta" class="z-10">
    <template #header>
      <div class="flex flex-wrap justify-between mb-4">
        <ProductCategoryCreateForm :parentCategories="parentCategories" />
      </div>
    </template>
  </DataTable>
</template>
