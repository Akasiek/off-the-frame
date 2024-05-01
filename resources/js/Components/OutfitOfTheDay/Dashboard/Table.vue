<script setup lang="ts">
import { h } from 'vue';
import { OutfitOfTheDay, Product } from '@/Interfaces';
import { ColumnDef } from '@tanstack/vue-table';
import { DataTable } from '@/Components/ui/table';
import { OutfitOfTheDayCreateForm, OutfitOfTheDayUpdateForm } from '@/Components/OutfitOfTheDay/Form';
import { OutfitOfTheDayDeleteDialog } from '@/Components/OutfitOfTheDay/Delete';

const { outfitsOfTheDay, products } = defineProps<{
  outfitsOfTheDay: { data: OutfitOfTheDay[] };
  products: Product[];
}>();

const columns: ColumnDef<OutfitOfTheDay>[] = [
  {
    accessorKey: 'name',
    header: 'Nazwa',
    cell: (props) => props.row.original.name,
  },
  {
    accessorKey: 'image_source_url',
    header: 'Źródło zdjęcia',
    cell: (props) => props.row.original.image_source_url,
  },
  {
    accessorKey: 'image',
    header: 'Zdjęcie',
    cell: (props) =>
      props.row.original.image
        ? h('img', {
            src: props.row.original.image,
            class: 'w-16 h-16 object-cover',
          })
        : null,
  },
  {
    accessorKey: 'products',
    header: 'Produkty',
    cell: (props) =>
      h(
        'div',
        { class: 'flex flex-wrap gap-2' },
        props.row.original.products.map((product, index) =>
          h('div', { class: 'flex gap-2' }, [
            h('span', `${product.model} (${product.brand}) ${index === props.row.original.products.length - 1 ? '' : ','}`),
          ])
        )
      ),
  },

  {
    id: 'actions',
    header: 'Akcje',
    cell: (props) =>
      h('div', { class: 'space-x-2 min-w-14' }, [
        h(OutfitOfTheDayUpdateForm, {
          products: products,
          outfitOfTheDay: props.row.original,
        }),
        h(OutfitOfTheDayDeleteDialog, { modelId: props.row.original.id }),
      ]),
  },
];
</script>

<template>
  <DataTable :data="outfitsOfTheDay.data" :columns="columns" class="z-10">
    <template #header>
      <div class="flex flex-wrap justify-between mb-4">
        <OutfitOfTheDayCreateForm :products="products" />
      </div>
    </template>
  </DataTable>
</template>
