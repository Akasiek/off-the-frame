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
    <div class="lg:my-16 my-12 lg:px-8 sm:px-4 px-2">
      <div class="mx-auto max-w-6xl my-12">
        <CategoryButtons :categories="categories" />
      </div>

      <PaginatedList :total="products.meta.total" :per-page="products.meta.per_page">
        <div
          class="mx-auto max-w-6xl grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-12 gap-y-8 xs:gap-x-4 gap-x-2 justify-items-center"
          v-if="products.data.length"
        >
          <template v-for="product in products.data">
            <Card :product="product" />
          </template>
        </div>
        <div class="mx-auto max-w-6xl text-center my-24" v-else>
          <p class="font-bold text-2xl">No products found for this query.</p>
        </div>
      </PaginatedList>
    </div>
  </PrimaryLayout>
</template>
