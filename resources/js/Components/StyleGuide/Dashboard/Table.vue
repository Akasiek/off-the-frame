<script setup lang="ts">
import { h } from 'vue';
import { OutfitOfTheDay, Product, StyleGuide } from '@/Interfaces';
import { ColumnDef } from '@tanstack/vue-table';
import { DataTable } from '@/Components/ui/table';
import { StyleGuideCreateForm, StyleGuideUpdateForm } from '@/Components/StyleGuide/Form';
import { StyleGuideDeleteDialog } from '@/Components/StyleGuide/Delete';

const { styleGuides, outfitsOfTheDay, products } = defineProps<{
  styleGuides: { data: StyleGuide[] };
  outfitsOfTheDay: OutfitOfTheDay[];
  products: Product[];
}>();

console.log(styleGuides);

const columns: ColumnDef<StyleGuide>[] = [
  {
    accessorKey: 'name',
    header: 'Nazwa',
    cell: (props) => props.row.original.name,
  },
  {
    accessorKey: 'description',
    header: 'Opis',
    // Render it and respect the line breaks
    cell: (props) => h('div', { class: 'whitespace-pre-line' }, props.row.original.description),
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
    accessorKey: 'outfit_of_the_day',
    header: 'Outfit of the day',
    cell: (props) =>
      h(
        'div',
        { class: 'flex flex-wrap gap-2' },
        props.row.original.outfitsOfTheDay.map((outfit, index) =>
          h('div', { class: 'flex gap-2' }, [
            h('span', `${outfit.name} ${index === props.row.original.outfitsOfTheDay.length - 1 ? '' : ','}`),
          ])
        )
      ),
  },

  {
    id: 'actions',
    header: 'Akcje',
    cell: (props) =>
      h('div', { class: 'space-x-2' }, [
        h(StyleGuideUpdateForm, {
          products: products,
          outfitsOfTheDay: outfitsOfTheDay,
          styleGuide: props.row.original,
        }),
        h(StyleGuideDeleteDialog, { modelId: props.row.original.id }),
      ]),
  },
];
</script>

<template>
  <DataTable :data="styleGuides.data" :columns="columns" class="z-10">
    <template #header>
      <div class="flex flex-wrap justify-between mb-4">
        <StyleGuideCreateForm :products="products" :outfitsOfTheDay="outfitsOfTheDay" />
      </div>
    </template>
  </DataTable>
</template>
