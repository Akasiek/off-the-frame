<script setup lang="ts">
import {
  Pagination,
  PaginationEllipsis,
  PaginationFirst,
  PaginationLast,
  PaginationList,
  PaginationListItem,
  PaginationNext,
  PaginationPrev,
} from '@/Components/ui/pagination';

import { Button } from '@/Components/ui/button';
import { router } from '@inertiajs/vue3';

defineProps<{
  total: number;
  perPage: number;
}>();

const getCurrentPage = () => {
  const params = new URLSearchParams(window.location.search);
  let pageParam = params.get('page');

  if (pageParam) {
    return parseInt(pageParam);
  }

  return 1;
};

const handlePageChange = (page: number) => {
  // Change page query parameter or add it to the URL

  const params = new URLSearchParams(window.location.search);
  let pageParam = params.get('page');

  if (pageParam) {
    params.set('page', page.toString());
  } else {
    params.append('page', page.toString());
  }

  router.visit(window.location.pathname + '?' + params.toString());
};
</script>

<template>
  <Pagination
    v-slot="{ page }"
    :sibling-count="1"
    show-edges
    :total="total"
    :items-per-page="perPage"
    @update:page="handlePageChange"
    :default-page="getCurrentPage()"
  >
    <PaginationList v-slot="{ items }" class="flex items-center gap-1">
      <PaginationFirst />
      <PaginationPrev />

      <template v-for="(item, index) in items">
        <PaginationListItem v-if="item.type === 'page'" :key="index" :value="item.value" as-child>
          <Button
            class="lg:w-10 md:w-8 w-6 lg:h-10 md:h-8 h-6 p-0 rounded-full font-serif"
            :variant="item.value === page ? 'default' : 'outline'"
          >
            {{ item.value }}
          </Button>
        </PaginationListItem>
        <PaginationEllipsis v-else :key="item.type" :index="index" />
      </template>

      <PaginationNext />
      <PaginationLast />
    </PaginationList>
  </Pagination>
</template>

<style scoped></style>
