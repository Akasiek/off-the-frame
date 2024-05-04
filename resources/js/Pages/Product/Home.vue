<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import PaginatedList from '@/Components/PaginatedList.vue';
import { HomeLinks, HomeMeta, Product, ProductCategory } from '@/Interfaces';
import Card from '@/Components/Product/View/Card.vue';
import CategoryButtons from '@/Components/Product/Home/CategoryButtons.vue';

defineProps<{
  products: {
    data: Product[];
    links: HomeLinks;
    meta: HomeMeta;
  };
  categories: ProductCategory[];
}>();
</script>

<template>
  <PrimaryLayout title="Products">
    <div class="my-16">
      <div class="mx-auto max-w-6xl my-12">
        <CategoryButtons :categories="categories" />
      </div>

      <PaginatedList :total="products.meta.total" :per-page="products.meta.per_page">
        <div class="mx-auto max-w-6xl grid grid-cols-4 gap-y-12 gap-x-4 justify-items-center">
          <template v-for="product in products.data">
            <Card :product="product" />
          </template>
        </div>
      </PaginatedList>
    </div>
  </PrimaryLayout>
</template>
