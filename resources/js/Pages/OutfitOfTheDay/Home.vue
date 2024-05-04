<script setup lang="ts">
import { HomeLinks, HomeMeta, OutfitOfTheDay } from '@/Interfaces';
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import PaginatedList from '@/Components/PaginatedList.vue';
import Card from '@/Components/OutfitOfTheDay/Card.vue';

defineProps<{
  outfitsOfTheDay: {
    data: OutfitOfTheDay[];
    links: HomeLinks;
    meta: HomeMeta;
  };
}>();
</script>

<template>
  <PrimaryLayout title="Products"
    ><div class="my-16">
      <PaginatedList :total="outfitsOfTheDay.meta.total" :per-page="outfitsOfTheDay.meta.per_page">
        <div class="mx-auto max-w-6xl grid grid-cols-4 gap-y-12 gap-x-4 justify-items-center">
          <template v-for="outfit in outfitsOfTheDay.data">
            <Card :outfit-of-the-day="outfit" />
          </template>
        </div>
      </PaginatedList>
    </div>
  </PrimaryLayout>
</template>
