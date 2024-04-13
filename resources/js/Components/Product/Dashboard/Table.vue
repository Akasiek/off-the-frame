<script setup lang="ts">
import { h } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Product, ProductCategory } from '@/Interfaces';
import { ColumnDef } from '@tanstack/vue-table';
import { DataTable } from '@/Components/ui/table';
import { ProductCreateForm } from '@/Components/Product/Form';

const page = usePage();
const { products } = defineProps<{
  products: Product[];
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

  // {
  //   id: 'actions',
  //   header: 'Akcje',
  //   cell: (props) =>
  //     h('div', { class: 'space-x-2' }, [
  //       h(LectureUpdateForm, {
  //         lecture: props.row.original,
  //         subjects: subjects,
  //       }),
  //       h(LectureDeleteDialog, { lectureId: props.row.original.id }),
  //     ]),
  // },
];
</script>

<template>
  <DataTable :data="products" :columns="columns" class="z-10">
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
