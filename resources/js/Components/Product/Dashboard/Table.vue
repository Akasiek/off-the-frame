<script setup lang="ts">
import { h } from 'vue';
import { Product, ProductCategory } from '@/Interfaces';
import { ColumnDef } from '@tanstack/vue-table';
import { DataTable } from '@/Components/ui/table';
import { ProductCreateForm, ProductUpdateForm } from '@/Components/Product/Form';
import { ProductDeleteDialog } from '@/Components/Product/Delete';

const { products, categories } = defineProps<{
  products: { data: Product[] };
  categories: ProductCategory[];
}>();

const columns: ColumnDef<Product>[] = [
  {
    accessorKey: 'brand',
    header: 'Marka',
    cell: (props) => props.row.original.brand,
  },
  {
    accessorKey: 'model',
    header: 'Model',
    cell: (props) => props.row.original.model,
  },
  {
    accessorKey: 'category.name',
    header: 'Kategoria',
    cell: (props) => props.row.original.category.name,
  },

  {
    accessorKey: 'links',
    header: 'Linki',
    cell: (props) =>
      props.row.original.links
        ? h(
            'div',
            { class: 'space-x-2' },
            props.row.original.links.map((link) =>
              h(
                'a',
                {
                  href: link.url,
                  target: '_blank',
                  class: 'text-blue-500 underline',
                },
                link.store
              )
            )
          )
        : h('div', 'Brak linków'),
  },
  {
    accessorKey: 'images',
    header: 'Zdjęcia',
    cell: (props) =>
      props.row.original?.images
        ? h(
            'div',
            { class: 'flex flex-wrap gap-4' },
            props.row.original.images.map((image) =>
              h('img', {
                src: image.url,
                class: 'w-16 h-16 object-cover',
              })
            )
          )
        : h('div', 'Brak zdjęć'),
  },

  {
    id: 'actions',
    header: 'Akcje',
    cell: (props) =>
      h('div', { class: 'space-x-2' }, [
        h(ProductUpdateForm, {
          product: props.row.original,
          categories: categories,
        }),
        h(ProductDeleteDialog, { productId: props.row.original.id }),
      ]),
  },
];
</script>

<template>
  <DataTable :data="products.data" :columns="columns" class="z-10">
    <template #header>
      <div class="flex flex-wrap justify-between mb-4">
        <!--            <div class="flex items-center py-4">-->
        <!--              <div class="w-64">-->
        <!--                <SubjectSelectFilter :subjects="subjects" :table="table" />-->
        <!--              </div>-->
        <!--            </div>-->

        <ProductCreateForm :categories="categories" />
      </div>
    </template>
  </DataTable>
</template>
