<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';

const links = [
  {
    route: 'style-guides.index',
    name: 'style guides',
  },
  {
    route: 'products.index',
    name: 'products by category',
  },
  {
    route: 'outfits-of-the-day.index',
    name: 'outfit of the day',
  },
];
</script>

<template>
  <div class="bg-white-100 rounded-t-3xl shadow-[0_-4px_16px_0_rgba(0,0,0,0.075)] flex px-16 py-10">
    <div class="flex-1 space-y-4">
      <div>
        <Link :href="route('home')" class="font-semibold">
          <Logo class="h-16 w-fit" />
        </Link>
      </div>

      <div class="flex flex-col gap-y-2">
        <Link :href="route(link.route)" v-for="link in links" :key="link.route" class="font-semibold text-black cool-underline w-fit">
          {{ link.name }}
        </Link>
      </div>
    </div>
  </div>
</template>
