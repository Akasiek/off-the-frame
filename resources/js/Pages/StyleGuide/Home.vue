<script setup lang="ts">
import { HomeLinks, PaginatedMeta, StyleGuide } from '@/Interfaces';
import Card from '@/Components/StyleGuide/Card.vue';
import PaginatedList from '@/Components/PaginatedList.vue';
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';

defineProps<{
  styleGuides: {
    data: StyleGuide[];
    links: HomeLinks;
    meta: PaginatedMeta;
  };
}>();
</script>

<template>
  <PrimaryLayout
    title="Stylish Clothes Guide: Elevate Your Wardrobe Effortlessly"
    description="Master the art of style with our ultimate style guide. Stay ahead of the fashion curve and express your unique sense of style."
  >
    <div class="lg:my-16 my-12 lg:px-8 sm:px-4 px-2">
      <PaginatedList :total="styleGuides.meta.total" :per-page="styleGuides.meta.per_page">
        <div class="mx-auto max-w-6xl grid grid-cols-2 lg:gap-y-12 md:gap-y-8 gap-y-4 xs:gap-x-4 gap-x-2 justify-items-center">
          <template v-for="styleGuide in styleGuides.data">
            <Card :style-guide="styleGuide" />
          </template>
        </div>
      </PaginatedList>
    </div>
  </PrimaryLayout>
</template>
