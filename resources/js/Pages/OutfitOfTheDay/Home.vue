<script setup lang="ts">
import { HomeLinks, OutfitOfTheDay, PaginatedMeta } from '@/Interfaces';
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';
import PaginatedList from '@/Components/PaginatedList.vue';
import Card from '@/Components/OutfitOfTheDay/Card.vue';

defineProps<{
  outfitsOfTheDay: {
    data: OutfitOfTheDay[];
    links: HomeLinks;
    meta: PaginatedMeta;
  };
}>();
</script>

<template>
  <PrimaryLayout title="Outfits of the Day"
    ><div class="lg:my-16 my-12 lg:px-8 sm:px-4 px-2">
      <PaginatedList :total="outfitsOfTheDay.meta.total" :per-page="outfitsOfTheDay.meta.per_page">
        <div class="mx-auto max-w-6xl grid lg:grid-cols-3 grid-cols-2 lg:gap-y-12 gap-y-6 xs:gap-x-6 gap-x-2 justify-items-center">
          <template v-for="outfit in outfitsOfTheDay.data">
            <Card :outfit-of-the-day="outfit" />
          </template>
        </div>
      </PaginatedList>
    </div>
  </PrimaryLayout>
</template>
